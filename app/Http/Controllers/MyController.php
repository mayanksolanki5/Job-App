<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function exportxl() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');  
    }


        /**
    * @return \Illuminate\Support\Collection
    */


    public function importExportView()
    {
       return view('import');
    }


    /**
    * @return \Illuminate\Support\Collection
    */


    public function import() 
    {
        if(request()->file('file')){
            Excel::import(new UsersImport,request()->file('file'));
        }
        else{
            session()->flash('message', 'File Not Selected!'); 
            session()->flash('alert-class', 'alert-danger');     
        }
           
        return back();
    }
}
