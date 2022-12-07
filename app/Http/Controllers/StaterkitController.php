<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Recuiter;
use App\Models\Vartical;
use App\Models\Candidate;
use App\Models\Clients;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaterkitController extends Controller
{
    // home
    public function home()
    {
        $breadcrumbs = [
            ['link' => "dashboard", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
    }

    public function users_list()
    {
        $breadcrumbs = [
            ['link' => "dashboard", 'name' => "Home"],['name' => "Users List"]
        ];
        return view('/content/users-list', ['breadcrumbs' => $breadcrumbs]);
    }

    public function add_employee()
    {
        // $designation = DB::table('emp_designation')->get('emp_designation.*');
        // dd($designation);

        $breadcrumbs = [
            ['link' => "employees", 'name' => "Employee List"], ['name' => "Add Employee"]
        ];
        return view('/content/add-employees-list', ['breadcrumbs' => $breadcrumbs ]);
    }

    public function client_list()
    {
        $breadcrumbs = [
            ['link' => "client", 'name' => "Client List"], ['name' => "Add New Client"]
        ];
        return view('/content/add-client-list', ['breadcrumbs' => $breadcrumbs]);
    }

    public function client_show()
    {
        // $candidate = Candidate::all();

        $client = Clients::leftjoin('users', 'client.added_by', '=', 'users.id' )
        // ->whereNull('candidate.added_by')
        // ->orderBy('users.id')
        ->get(['client.*', 'users.name as emp_name', 'users.id as user_id']);

        // dd($candidate);

       
        $breadcrumbs = [
            ['link' => "candidate", 'name' => "Candidate List"], ['name' => "Add New Candidate"]
        ];
        return view('/content/show-candidate-list', ['breadcrumbs' => $breadcrumbs ,  'candidate' => $client ]);
    }
   

}
