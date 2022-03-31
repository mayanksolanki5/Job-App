<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class UserController extends Controller
{
    public function index()
    {   
        return view('welcome');
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
