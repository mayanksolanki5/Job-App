<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
        // return view('home');
    }

    public function update(Request $request){
        $id = auth()->user()->id;
        User::where('id', $id)
                ->update(['firstname' => $request->input('firstname'),
                         'lastname'=>$request->input('lastname'),
                         'address'=>$request->input('address'),
                         'number'=>$request->input('number'),
                         'birthday'=>$request->input('birthday'),
                         'email'=>$request->input('email'),   
                         'experience'=>$request->input('experience'),
                         'position'=>$request->input('position'),
                         'salary'=>$request->input('salary'),
                         'password'=>$request->input('password'),
                         ]
                        );
            return redirect()->back();            
    }    

    public function profile()
    {
        return view('profile');
    }
}
