<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;


class RegisterController extends Controller
{
    public function index()
    {
        // return User::all();
        $user = User::all();
        return UserResource::collection($user);
    }

    public function store(RegisterRequest $request)
    {
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->experience = $request->experience;
        $user->position = $request->position;
        $user->salary = $request->salary;
        $user->password = $request->password;
        $user->save();

        return response([
            'data' => new UserResource($user)
        ], Response::HTTP_CREATED);

    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    // public function destroy(User $user)
    // {
    //     return $user;
    // }
    
    public function update(Request $request, User $user, $id)
    {
        // return $user;
        
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

        return User::find($id); 
    }
}
