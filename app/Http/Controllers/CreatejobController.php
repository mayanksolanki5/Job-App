<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Createjob;
use App\Functional;
use App\Category;
use DataTables;


class CreatejobController extends Controller
{
    public function createjob()
    {   
        $functionals = Functional::with('createjob')->get();
        $categories = Category::with('createjob')->get();
        // dd($categories);
        return view('createjob')->with('functionals',$functionals)->with('categories',$categories);
    }

    public function submitjob(Request $request)
    {
     
            $data = new Createjob();
            $data->job_title = $request->job_title;
            $data->job_description = $request->job_description;
            $data->location = $request->location;
            $data->functional_id = $request->functional_area;
            $data->category_id = $request->job_category;
            $data->job_time = $request->job_time;
            $data->work_from_home = $request->work_from_home;
            $data->vacancies = $request->vacancies;
            $data->gender = $request->gender;
            $data->minimum_age = $request->minimum_age;
            $data->maximum_age = $request->maximum_age;
            $data->qualification = $request->qualification;
            $data->experience = $request->experience;
            $data->benefits = $request->benefits;
            $data->currency = $request->currency;
            $data->minimum_salary = $request->minimum_salary;
            $data->maximum_salary = $request->maximum_salary;
            $data->organization_name = $request->organization_name;
            $data->about_organization = $request->about_organization;
            $data->contact = $request->contact;
            $data->skill = $request->skill;
            $data->save();
            
            session()->flash('message', 'Data Inserted!'); 
            session()->flash('alert-class', 'alert-success'); 
            return redirect()->back();
     
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Createjob::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
   
                           $btn = '<a href="/editjob/'. $data->id .'" name="edit" class="edit btn btn-primary btn-sm">Edit</a>
                                    <a href="/deletejob/'. $data->id .'" name="delete" class="edit btn btn-danger btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('jobsTable');
    }
    
    public function editjob($id)
    {
        $functionals = Functional::with('createjob')->get();
        $categories = Category::with('createjob')->get();
        return view('editjob')->with('dataa', Createjob::all())->with('functionals', $functionals)->with('categories', $categories)->with('id', $id); 
        // return view('editjob')->with('dataa', Createjob::all())->with('id', $id); 
        // return view('editjob')->with('dataa', Createjob::where('id', $id)->first()); 
    }

    public function updatejob(Request $request,$id){
        
        Createjob::where('id', $id)
                ->update(['job_title' => $request->input('job_title'),
                         'job_description'=>$request->input('job_description'),
                         'location'=>$request->input('location'),
                         'functional_id'=>$request->input('functional_area'),
                         'category_id'=>$request->input('job_category'),
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
            return redirect()->back()->with('message','Updated Sucessfully!');            
    }    


    public function deletejob($id)
    {
        $user=Createjob::find($id);
        $user->delete();

        session()->flash('message', 'Data Deleted!'); 
        session()->flash('alert-class', 'alert-danger'); 

        return redirect()->back();
    }
}
