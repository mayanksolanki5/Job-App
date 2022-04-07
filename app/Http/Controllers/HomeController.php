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
        // $status = auth()->user()->active;
        // // print_r(auth()->user()->active);
        // // die;
        // if($status == 1){
        //     return view('admin.dashboard');
        // }
        // else{
        //     auth()->logout();
        //     return view('auth.login');
        // }

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
                         'salary'=>$request->input('salary')
                         ]
                        );
            return redirect()->back()->with('message','Updated Sucessfully!');            
    }    

    public function updateall(Request $request,$id){
        
        User::where('id', $id)
                ->update(['firstname' => $request->input('firstname'),
                         'lastname'=>$request->input('lastname'),
                         'address'=>$request->input('address'),
                         'number'=>$request->input('number'),
                         'birthday'=>$request->input('birthday'),
                         'email'=>$request->input('email'),   
                         'experience'=>$request->input('experience'),
                         'position'=>$request->input('position'),
                         'salary'=>$request->input('salary')
                         ]
                        );
            return redirect()->back()->with('message','Updated Sucessfully!');            
    }    

    
    


    // public function upload(Request $request)
    // {
    //     if($request->hasFile('image')){
    //         $filename = $request->image->getClientOriginalName();
    //         dd($filename);
    //         $request->image->storeAs('images', $filename, 'public');  
    //         auth()->user()->update(['avtar' => $filname]); 
    //     }
    // }

    public function profile()
    {
        return view('profile');
    }
}
