<?php

namespace App\Http\Controllers\api;

use App\applyJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplyjobAPIController extends Controller
{
    public function index()
    {
        return applyJob::all();
    }

    public function store(Request $request)
    {
        $application = new applyJob();
        $application->full_name = $request->full_name;
        $application->user_id = $request->user_id;
        $application->createjob_id = $request->createjob_id;
        $application->number = $request->number;
        $application->current_company = $request->current_company;
        $application->current_designation = $request->current_designation;
        $application->current_location = $request->current_location;
        $application->current_salary = $request->current_salary;
        $application->industry = $request->industry;
        $application->functional_area = $request->functional_area;
        $application->experience_year = $request->experience_year;
        $application->experience_month = $request->experience_month;
        $application->skill = $request->skill;
        $application->reason = $request->reason;
        $application->save();

        return $application;
    }

    public function destroy($id)
    {
        applyJob::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        applyJob::where('id', $id)
        ->update(['full_name' => $request->input('full_name'),         
                'user_id'=>$request->input('user_id'),
                'createjob_id'=>$request->input('createjob_id'),
                 'number'=>$request->input('number'),
                 'current_company'=>$request->input('current_company'),
                 'current_designation'=>$request->input('current_designation'),
                 'current_location'=>$request->input('current_location'),   
                 'current_salary'=>$request->input('current_salary'),
                 'industry'=>$request->input('industry'),
                 'functional_area'=>$request->input('functional_area'),
                 'experience_year'=>$request->input('experience_year'),
                 'experience_month'=>$request->input('experience_month'),
                 'skill'=>$request->input('skill'),
                 'reason'=>$request->input('reason'),
                 ]
                );
                
        return applyJob::find($id); 
    }
}
