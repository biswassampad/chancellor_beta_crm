<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function getusers(){
        $users = DB::table('users')->get();

        return view('adduser',compact('users'));
    }
    public function addcashier(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $users =DB::table('users')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'created_at'=>$time,
            'updated_at'=>$time
        ]);
        return response()->json($users);

    }
}
