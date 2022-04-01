<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


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


    public function loginpage()
    {
        return view('template.login');
    }

    public function registerpage()
    {
        return view('template.register');
    }
}
