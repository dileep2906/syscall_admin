<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use App\Models\Company;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Clients;
use App\Imports\ExcelImport;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\WorkExperience;
use App\Models\PincodeLocation;
use App\Models\Recuiter;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class CandidateController extends Controller
{
    public function index()
    {
        if (Session::get('user')['user_role'] == 'ADMIN') {
            $client = Clients::leftjoin('users', 'clients.added_by', '=', 'users.id')
                ->where('clients.IsDeleted' , 0)->orderBy('id', 'DESC')
                ->get(['clients.*', 'users.name as emp_name', 'users.id as user_id']);
        } else {
            $client = Clients::select("*")
                ->where("added_by", "=", Auth::id())
                ->where("IsDeleted", "=", 0)
                ->orderBy('id', 'DESC')
                // ->groupBy('added_by')
                ->get();
        }

                $users = User::where('user_role', "=", "EMPLOYEE")->where("IsDeleted", "=", 0)->orderBy('id', 'DESC')->get();

        $breadcrumbs = [
            ['link' => "dashboard", 'name' => "Dashboard"], ['name' => "Candidate List"]
        ];
        return view('/content/client-list', ['breadcrumbs' => $breadcrumbs, 'client' => $client, 'users' => $users]);
    }

    public function getCandidateData(Request $request)
    {
        $id = $request->location_id;
        // dd($id);
        $candidate = Clients::where('id', $id)->first();

        return response()->json([
            'data' => $candidate
        ]);
    }

    public function fetchCandidateDetails(Request $request)
    {
        $id =$request->candidate_id;
        // dd($id);
        $candidate['candidate'] = Clients::where('id', $id)->first();

        return response()->json([
            'candidate' => $candidate
        ]);

    }

   

    public function excel_uploade()
    {
        // $breadcrumbs = [
        //     ['link' => "dashboard", 'name' => "Dashboard"], ['name' => "Dashboard"]
        // ];
        // return view('content.add-excel-list',['breadcrumbs' => $breadcrumbs] );
        return view('content.add-excel-list');
    }

    public function assign_emp(Request $request)
    {
        // dd($request->all());

        $adduser  = $request->candidate;

        $name = $request->name;


        $ids = explode(',', $adduser);


        // print_r($ids);

        foreach ($ids as $id) {

            $emp_assign =  DB::update('update clients set added_by = ? where id = ?', [$name, $id]);
        }

        return response()->json();

        // return redirect('candidate')->with('message', 'User Assign has been Successfully');
    }

    public function clientUpdate(Request $request)
    {

        $client = Clients::where('id', $request->candidateId)->first();
        $breadcrumbs = [
            ['link' => "client", 'name' => "Client List"], ['name' => "Update Client Details"]
        ];
        return view('/content/update-client-list', ['breadcrumbs' => $breadcrumbs , 'client' => $client]);
    }

    public function store(Request $request)
    {

        // dd($request);
        if (Clients::where('email', $request->email)->exists()) {
            return back()->with('error', 'Email alrady exist ');
        }
        else {
           
                $client = new Clients();
                $client->name = $request->name;
                $client->number = $request->contact;
                $client->email = $request->email;
                $client->job = $request->job;
               
                $client->added_by = Auth::id();             

                
                $client->save();
               
                return redirect('client')->with('message', 'Client has been Added Successfully');
            

        }
    }

    public function update_client(Request $request)
    {
        $candidate = Clients::where('id', $request->candidate_id)->first();

        $candidate->name = $request->name;
        $candidate->number = $request->number;
        $candidate->email = $request->email;
        $candidate->job = $request->job;
       
        $candidate->update();

       
       
        
        return redirect('client')->with('message', 'Client has been Updated Successfully');
    }






    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required',
            // 'email' => 'required|email|unique:candidate',
        ]);
        try {
            // dd($request->file('excel_file'));

            // Excel::import(new CandidateImport,  $request->excel_file);
            Excel::import(new ExcelImport, $request->excel_file);
            return redirect('client')->with('message', 'Excel Imported Successfully');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            // dd($failures);
            return redirect('client')->with('import_error', $failures);
        }
    }






    public function destroy($id)
    {
        $candidate = Client::where('id', $id)->first();
       
        $candidate->IsDeleted = 1;

        $candidate->update();

        return back()->with('message', 'Candidate has been deleted Successfully');;
    }
   
}
