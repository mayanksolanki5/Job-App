<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Functional;


class FunctionalController extends Controller
{
    public function createfunctional()
    {   
        $functionals = Functional::all();
        return view('createfunctional')->with('functionals', $functionals);
    }

    public function addfunctional(Request $request)
    {
        $data = new Functional();
        $data->functional_area = $request->functional_area;
        $data->save();

        session()->flash('message', 'Data Added!'); 
        session()->flash('alert-class', 'alert-success'); 

        return redirect()->back();
    }

    public function functionalview()
    {   
        return view('addFunctional');
    }

    public function delete($id)
    {
        Functional::find($id)->delete($id);

        session()->flash('message', 'Data Deleted!'); 
        session()->flash('alert-class', 'alert-danger'); 

        return redirect()->back();
    }

    public function edit($id)
    {
        return view('editFunctional')->with('dataa', Functional::all())->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        Functional::where('id', $id)
        ->update(['functional_area' => $request->input('functional_area'),
                 ]
        );

            session()->flash('message', 'Data Updated!'); 
            session()->flash('alert-class', 'alert-success'); 
        
        return redirect()->back();
    }


}
