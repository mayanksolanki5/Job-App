<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{   
    public function createcategory()
    {   
        $categories = Category::all();
        return view('createcategory')->with('categories', $categories);
    }

    public function categoryview()
    {   
        return view('addCategory');
    }

    public function addcategory(Request $request)
    {
        $data = new Category();
        $data->job_category = $request->job_category;
        $data->save();

        session()->flash('message', 'Data Added!'); 
        session()->flash('alert-class', 'alert-success');

        return redirect()->back();
    }
    
    public function delete($id)
    {
        Category::find($id)->delete($id);

        session()->flash('message', 'Data Deleted!'); 
        session()->flash('alert-class', 'alert-danger');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('editCategory')->with('dataa', Category::all())->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)
        ->update(['job_category' => $request->input('job_category'),
                 ]
                );
                session()->flash('message', 'Data Updated!'); 
                session()->flash('alert-class', 'alert-success');

        return redirect()->back();
    }
}
