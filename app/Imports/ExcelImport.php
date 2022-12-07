<?php

namespace App\Imports;

use Auth;
use App\Models\Candidate;
use App\Models\Clients;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $candidate = DB::table('clients')->get();

        
    // Get all email id from the $candidate collection

        $email = $candidate->pluck('email');

        // dd($email);
         // Checking if the email id is already in the database
    if ($email->contains($row['email']) == false) 
        return new Clients([
                "name"                =>   $row['name'],
                'number'              =>   $row['number'],
                'email'               =>   $row['email'],
                'job'                 =>   $row['job'],
                'added_by'            =>   Auth::id(),

        ]);
    }
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:candidate',
             // Above is alias for as it always validates in batches
             '*.email' =>'required|email|unique:candidate',
        ];
    }
}
