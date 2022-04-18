<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Functional;
use App\Category;
use App\Createjob;
use App\applyJob;
use DataTables;



class ApplyJobController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Createjob::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
   
                           $btn = '<a href="/viewjob/'. $data->id .'" name="view" class="btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('jobList');
    }

    public function viewjob($id)
    {
        $functionals = Functional::with('createjob')->get();
        $categories = Category::with('createjob')->get();
        return view('viewjob')->with('dataa', Createjob::all())->with('functionals', $functionals)->with('categories', $categories)->with('id', $id);
    }

    public function applyjob($jobid)
    {
        return view('applyJob')->with('jobid', $jobid); 
    }

    public function submit($job_id, Request $request)
    {
        $user_id = Auth::id();

        $data = new applyJob();
        $data->full_name = $request->full_name;
        $data->user_id = $user_id;
        $data->createjob_id = $job_id;
        $data->number = $request->number;
        $data->current_company = $request->current_company;
        $data->current_designation = $request->current_designation;
        $data->current_location = $request->current_location;
        $data->current_salary = $request->current_salary;
        $data->industry = $request->industry;
        $data->functional_area = $request->functional_area;
        $data->experience_year = $request->experience_year;
        $data->experience_month = $request->experience_month;
        $data->skill = $request->skill;
        $data->reason = $request->reason;
        $data->save();
        
        session()->flash('message', 'Application Saved!'); 
        session()->flash('alert-class', 'alert-success'); 

        return redirect()->back();

        
    }

}

