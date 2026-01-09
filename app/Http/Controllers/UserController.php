<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $formFields = $req->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'min:8',
                'regex:/^[A-Za-z0-9!@#\-_]+$/'
            ]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        Auth::login($user);

        return redirect('/');
    }

    public function signOut(){
        Auth::logout();
        return back();
    }

public function login(Request $req){
    $formFields = $req ->validate([
        "email" => ['required'],
        "password" => ['required'],
        
    ]);
    
    if(Auth::attempt($formFields)){
        return redirect('/');
    }else{
        return back()->with('message','Invalid Credentials');
    }
}

}
