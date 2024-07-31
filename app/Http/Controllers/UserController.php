<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function user(){
        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list' , $data);
    }

    public function add_user(Request $request){
        return view('backend.user.add');
    }

    public function insert_user(Request $request){

       $save = new User;

       $save->name = trim($request->name);
       $save->email = trim($request->email);
       $save->password = Hash::make($request->password);
       $save->status = trim($request->status);
       $save->save();
       return redirect('panel/user/list')->with('success' , 'User Inserted Successfully');
    }

    public function edit_user($id){

        $data['getRecord'] = User::getSingle($id);
        return view('backend.user.edit' , $data);
    }

    public function update_user(Request $request, $id){
        $user = User::find($id);

        if($user){
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            if($request->password){
                $user->password = Hash::make($request->password);
            }
            $user->status = trim($request->status);
            $user->save();

            return redirect('panel/user/list')->with('success', 'User Updated Successfully');
        } else {
            return redirect('panel/user/list')->with('error', 'User Not Found');
        }
    }

    public function delete_user($id){
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect('panel/user/list')->with('success', 'User Deleted Successfully');
        } else {
            return redirect('panel/user/list')->with('error', 'User Not Found');
        }
    }



   
}
