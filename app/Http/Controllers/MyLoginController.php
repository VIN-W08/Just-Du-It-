<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
        
        $rememberTokenExpTime = 120;
        $rememberTokenName = Auth::getRecallerName();
        Cookie::queue($rememberTokenName, Cookie::get($rememberTokenName),$rememberTokenExpTime);
        
        if($request->input("remember_me") == true){
            $remember = true;
        }
        else{
            $remember = false;
        }
        if(Auth::attempt($credentials,$remember)){
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
