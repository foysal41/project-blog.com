<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function create_user(Request $request){
        $save = new User();
        $save->name = trim($request->name);
        $save->email = trim($request->email);

        $save->password = Hash::make($request->password);
        $save->password = trim($request->password);
        $save->save();

        return redirect('/login')->with('success' , 'Your Account Register successfully');
    }

    public function forgotPassword(){
        return view('auth.forgot');
    }
}
