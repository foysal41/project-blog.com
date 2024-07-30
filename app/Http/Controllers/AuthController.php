<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



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
        $save->remember_token = Str::random(40);
        
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect('/login')->with('success' , 'Your Account Register successfully. Please verify the email');
    }

    public function forgotPassword(){
        return view('auth.forgot');
    }

    public function verify($token){
        $user = User::where('remember_token' , '=' , $token)->first();
        if(!empty($user)){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect('/login')->with('success' , 'Your email has been verified');
        }else{
            abort(404);
        }
    }
}
