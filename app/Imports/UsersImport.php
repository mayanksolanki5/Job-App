<?php

namespace App\Imports;

use App\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $data)
    {            
        $email = $data['email'];    
        $users = User::all(); 
        $user = $users->where('email',$email)->first();
        // dd($user);

        if ($user == NULL) {
            return new User([
                'firstname'     => $data['firstname'],
                'lastname'    => $data['lastname'], 
                'address'    => $data['address'], 
                'number'    => $data['number'], 
                'birthday'    => $data['birthday'], 
                'email'    => $data['email'], 
                'experience'    => $data['experience'], 
                'position'    => $data['position'], 
                'salary'    => $data['salary'],             
                'password' => Hash::make($data['password']),
            ]);
        } 
    }   

    // public function model(array $row)
    // {
    //     return new User([
    //         'firstname'     => $row['firstname'],
    //         'lastname'    => $row['lastname'], 
    //         'address'    => $row['address'], 
    //         'number'    => $row['number'], 
    //         'birthday'    => $row['birthday'], 
    //         'email'    => $row['email'], 
    //         'experience'    => $row['experience'], 
    //         'position'    => $row['position'], 
    //         'salary'    => $row['salary'],             
    //         'password' => $row['password'],
    //     ]);
    // }

    
}
