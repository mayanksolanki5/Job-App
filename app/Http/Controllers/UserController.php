<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends Controller
{
    public function index()
    {   
        return view('welcome');
    }

    public function forgotpassword()
    {
        return view('forgotpassword');
    }

    public function verifyemail(Request $request)
    {
        $email = $request->email;
        $usercount = User::where('email',$email)->get()->count();

        if($usercount == 1){
            
            $password = $request->input('password');
            $confirmPassword = $request->input('password-confirm');
            
            if($password == $confirmPassword){

                $password = bcrypt($password);
                
                User::where('email', $email)
                    ->update(['password'=>$password]
                );
                return redirect()->back()->with('message', 'Password Updated Successfully!');
            }
            else{
                return redirect()->back()->with('message', 'Please confirm your password!');
            }
        }
        else{
            return redirect()->back()->with('error', 'Email Address not Exist!');
        }
        
    }

    public function loginverify(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        $user1 = User::where('password', $password)->first();
        

        if($user && $user1){
            return view('admin.dashboard');
        }
     
    }




    public function resetpassword()
    {
        return view('resetpassword');
    }

    public function resetpwd(Request $request)
    {
        $password = $request->input('password');
        $passwordConfirm = $request->input('password-confirm');
        
        $id = auth()->user()->id;
        
        if($password == $passwordConfirm){
            $password = bcrypt($password);        
            
            User::where('id', $id)->update(['password'=>$password]);
            
            return redirect()->back()->with('message', 'Password Reset Succesfully!');            
        }
        else{
            return redirect()->back()->with('error', 'Please confirm your password!');            
        }
        
        
        // $oldPassword = $request->input('old-password');
        // $pass = auth()->user()->password;

        // if($oldPassword == $pass){
            
        // }
        // else{
        //     return redirect()->back()->with('error', 'You have enterd wrong Password!');            
        // }
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){

                            $btn = '<a href="/edit/'. $data->id .'" name="edit" class="edit btn btn-primary btn-sm">Edit</a>
                                    <button name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                            
                            // $btn .= '<input class="form-check-input" style="margin:5px" type="checkbox" checked/>';        
                            $btn .= '<a href="/loginstatus/'. $data->id .'" style="margin:5px">Status</a>';        
                            
                            return $btn;
                        })
                    ->addColumn('pdf', function($data){
                        $pdfBtn = '<a href="/generate-pdf/'. $data->id .'" name="pdf" class="edit btn btn-primary btn-sm">PDF</a>';        
                        return $pdfBtn;
                    })
                    ->rawColumns(['action','pdf'])
                    ->make(true);
        }
      
        return view('users');
    }


    public function destroy($id)
    {
        User::find($id)->delete($id);

        // return response()->json([
        //     'success' => 'Record deleted successfully!'
        // ]);
        // DB::table('table_name')->where('id', $id)->delete();
    }


    // public function edit($id)
    // {
    //     return view('edituser')->with('id', $id); 
    // }

    public function edit(Request $request, $id)
    {
        return view('edituser')->with('dataa', User::all())->with('id', $id); 
    }

    public function loginstatus(Request $request,$id){
        return view('loginstatus')->with('dataa', User::all())->with('id',$id);
    }

    public function active($id)
    {
        User::find($id)->update(['active' => true]);
        return redirect()->back();
    }

    public function inactive($id)
    {
        User::find($id)->update(['active' => false]);
        return redirect()->back();
        // return view('auth.login');
    }



    








    public function loginpage()
    {
        return view('template.login');
    }

    public function registerpage()
    {
        return view('template.register');
    }
}
