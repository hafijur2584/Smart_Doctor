<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::where('email',$request->email)->first();
            if($user->is_admin()){
                return redirect()->route('admin')->with('success','Login Successfully!!');
            }
            return redirect()->route('homepage')->with('success','Login Successfully!!');
        }
        return redirect()->back()->with('warning','credintials Not Match!!');;
    }
}
