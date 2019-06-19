<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
            $check = User::where('email',$request->email)->first();
            if($check){
                return response(['status'=>'error','message'=>'Email id already exists']);
            }else{
                
            $user = new User();
            $user ->name = $request->name;
            $user ->email = $request->email;
            $user->role = 3;
            $user ->password = $request->password;
            $user ->password = bcrypt($request->password);
            $user ->save();

            return response(200);
            }
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response(['status'=>'error','message'=>'User Not Found']);
        }
        if(!Hash::check($request->password,$user->password)){
            return response(['status'=>'error','message'=>'Password Did not Match']);
        }

        if(Hash::check($request->password,$user->password)){
            return response(200);
        }
    }
    public function stewartRegister(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
            $check = User::where('email',$request->email)->first();
            if($check){
                return response(['status'=>'error','message'=>'Email id already exists']);
            }else{
                
            $user = new User();
            $user ->name = $request->name;
            $user ->email = $request->email;
            $user->role = 4;
            $user ->password = $request->password;
            $user ->password = bcrypt($request->password);
            $user ->save();

            return response(200);
            }
    }
    public function stewartLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response(['status'=>'error','message'=>'User Not Found']);
        }
        if(!Hash::check($request->password,$user->password)){
            return response(['status'=>'error','message'=>'Password Did not Match']);
        }

        if(Hash::check($request->password,$user->password)){
            return response(200);
        }
        
    }
}
