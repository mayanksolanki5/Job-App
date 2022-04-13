<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;


class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $data = ['id' => $id, 'users' => User::all()];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('userData.pdf');
    }

    public function generatePdfAllUsers()
    {
        $data = ['users' => User::all()];
        $pdf = PDF::loadView('myPDF2', $data);
  
        return $pdf->download('usersData.pdf');
    }
}
