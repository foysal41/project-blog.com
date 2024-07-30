<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\forgotPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
// #8: Authenticate Default laravel
use Illuminate\Support\Facades\Auth;



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
    // #9 =    step 6 
    public function reset($token){
        $user = User::where('remember_token' , '=' , $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset' , $data);
        }else{
            abort(404);
        }
    }


    public function post_reset($token, Request $request){
        $user = User::where('remember_token' , '=' , $token)->first();
        if(!empty($user)){
            if($request->password == $request->cpassword){
                $user->password = Hash::make($request->password);
                if(empty($user->email_verified_at)){

                    $user->email_verified_at = date('Y-m-d H:i:s');
                }

                $user->remember_token = Str::random(40);
                $user->save();
                return redirect('/login')->with('success' , 'Password Changed Successfully');

            }else{

                return redirect()->back()->with('error' , 'Password Not Match');
            }
        }else{
            abort(404);
        }
    }

    // #9 = 3rd create forgotPassword controller
    public function forgot_password(Request $request){
        $user = User::where('email' , '=' , $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new forgotPasswordMail($user));
            return redirect()->back()->with('success' , 'We have e-mailed your password reset link!');


        }else{
            return redirect()->back()->with('error' , 'This Email Not Found');
        }
    }


    //#8 = 3rd create controller
    public function auth_login(Request $request ){
       // dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password] , $remember)){
            if(!empty(Auth::user()->email_verified_at)){
                echo 'success';
                die;
            }else{
                $user_id = Auth::user()->id;

                Auth::logout();
                
                $save = User::getSingle($user_id);
                $save->remember_token = Str::random(40);
                $save->save();

              
                Mail::to($save->email)->send(new RegisterMail($save));
                return redirect('')->back()->with('success' , 'Your Account Register successfully. Please verify the email');
                
            }
        }else{
            return redirect()->back()->with('error' , 'Invalid Email or Password');
        }

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
