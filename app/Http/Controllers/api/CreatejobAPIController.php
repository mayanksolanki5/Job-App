<?php

namespace App\Http\Controllers\api;

use App\Createjob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreatejobAPIController extends Controller
{
    public function index()
    {
        return Createjob::all();
    }

    public function store(Request $request)
    {
        $job = new Createjob();
        $job->user_id = $request->user_id;
        $job->job_title = $request->job_title;
        $job->job_description = $request->job_description;
        $job->location = $request->location;
        $job->functional_id = $request->functional_id;
        $job->category_id = $request->category_id;
        $job->job_time = $request->job_time;
        $job->work_from_home = $request->work_from_home;
        $job->vacancies = $request->vacancies;
        $job->gender = $request->gender;
        $job->minimum_age = $request->minimum_age;
        $job->maximum_age = $request->maximum_age;
        $job->qualification = $request->qualification;
        $job->experience = $request->experience;
        $job->benefits = $request->benefits;
        $job->currency = $request->currency;
        $job->minimum_salary = $request->minimum_salary;
        $job->maximum_salary = $request->maximum_salary;
        $job->organization_name = $request->organization_name;
        $job->about_organization = $request->about_organization;
        $job->contact = $request->contact;
        $job->skill = $request->skill;
        $job->save();

        return $job;
    }

    public function destroy($id)
    {
        Createjob::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        Createjob::where('id', $id)
        ->update(['job_title' => $request->input('job_title'),
                 'user_id'=>$request->input('user_id'),
                 'job_description'=>$request->input('job_description'),
                 'location'=>$request->input('location'),
                 'functional_id'=>$request->input('functional_id'),
                 'category_id'=>$request->input('category_id'),
                 'job_time'=>$request->input('job_time'),   
                 'work_from_home'=>$request->input('work_from_home'),
                 'vacancies'=>$request->input('vacancies'),
                 'gender'=>$request->input('gender'),
                 'minimum_age'=>$request->input('minimum_age'),
                 'maximum_age'=>$request->input('maximum_age'),
                 'qualification'=>$request->input('qualification'),
                 'experience'=>$request->input('experience'),
                 'benefits'=>$request->input('benefits'),
                 'currency'=>$request->input('currency'),
                 'minimum_salary'=>$request->input('minimum_salary'),
                 'maximum_salary'=>$request->input('maximum_salary'),
                 'organization_name'=>$request->input('organization_name'),
                 'about_organization'=>$request->input('about_organization'),
                 'contact'=>$request->input('contact'),
                 'skill'=>$request->input('skill'),
                 ]
                );

                return Createjob::find($id);
    }
}
