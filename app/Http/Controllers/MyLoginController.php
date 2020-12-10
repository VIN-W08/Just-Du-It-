<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyLoginController extends Controller
{
    function showLoginForm(){
        return view("my-layouts.login");
    }

    function validator(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:3",
        ]);
    }

    function login(Request $request){
        $this->validator($request);
        $credentials = $request->only(["email","password"]);
        if(Auth::attempt($credentials,false)){
            return redirect("home");
        }
        else{
            return redirect()->back();
        }
    }

    function logout(){
        Auth::logout();
        return redirect("login");
    }
}
