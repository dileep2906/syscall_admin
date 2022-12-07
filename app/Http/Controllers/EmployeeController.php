<?php

namespace App\Http\Controllers;

use App\Models\User;
use File;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = User::where('user_role', '=', 'EMPLOYEE')->where('IsDeleted' , 0)->orderBy('id', 'DESC')->get();
        $breadcrumbs = [
            ['link' => "dashboard", 'name' => "Home"], ['name' => "Employee Details"]
        ];
        return view('/content/employees-list', ['breadcrumbs' => $breadcrumbs, 'employees' => $employees]);
    }


    public function store(Request $request)
    {
        // dd($request);
        if (User::where('email', $request->email)->exists()) {
            //email exists in user table
            return back()->with('error', 'Email alrady exist ');
        }
        if (User::where('contact', $request->contact)->exists()) {
            //contact exists in user table
            return back()->with('error', 'Contact alrady exist ');
        }
       
     
        else {
            $employees = new User;
            $employees->name = $request->name;
            $employees->email = $request->email;
            $employees->password = bcrypt($request->password);
            $employees->contact = $request->contact;   

            $employees->user_role = 'EMPLOYEE';
            $employees->doj = $request->doj;

            if ($request->hasFile('user_profile')) {

                $file = $request->file('user_profile');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('user_profile/', $filename);
                $employees->user_profile = $filename;
            }

            $employees->save();

            return redirect('employees')->with('message', 'Employees has been Added Successfully');
        }
    }


    public function edit(Request $request)
    {
        $id = $request->employeeId;
        $employees = User::where('id', $id)->first();
        // $designation = DB::table('emp_designation')->get();


        $breadcrumbs = [
            ['link' => "employees", 'name' => "Employees List"], ['name' => "Update Employees Details"]
        ];
        return view('/content/update-employees-list', ['breadcrumbs' => $breadcrumbs,   'id' => $id])->with('employees', $employees);
    }


    public function update_employees(Request $request, $id)
    {
        $employees = User::where('id', $id)->first();
        $employees->name = $request->name;
        $employees->email = $request->email;

        if (!$request->password == '') {
            $employees->password = bcrypt($request->password);
        }

        $employees->contact = $request->contact;
       
        $employees->doj = $request->doj;
        $employees->user_role = 'EMPLOYEE';

        if ($request->hasFile('user_profile')) {

            // $old_file = public_path('user_profile/'.$request->user_profile);
            $upload_path = public_path('user_profile');
            $old_file = $upload_path . '/' . $request['user_profile'];
            // dd($old_file);
            if(File::exists($old_file)){
                unlink($old_file);
dd("hello");

            }
            // if (Storage::exists($old_file)) {
            //     //delete previous file
            //     unlink($old_file);
            // }
            $file = $request->file('user_profile');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('user_profile/', $filename);
            $employees->user_profile = $filename;
        }

        $employees->update();

        return redirect('employees')->with('message', 'Employees has been Updated Successfully');
    }


    public function destroy($id)
    {
        $employees = User::where('user_role', '=', 'EMPLOYEE')->get();

        $employees = User::where('id', $id)->first();
        $employees->IsDeleted = 1;

        $employees->update();

        // User::find($id)->delete();

        return back()->with('message', 'Employees has been deleted Successfully');
    }
    function random_strings($length_of_string)
    {

    // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    // Shuffle the $str_result and returns substring
    // of specified length
        return substr(str_shuffle($str_result),0, $length_of_string);
    }
}
