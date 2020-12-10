<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyRegisterController extends Controller
{
    function showRegisterForm(){
        return view("my-layouts.register");
    }

    function validator(Request $request){
        $request->validate([
            "username" => "required",
            "email" => "required|email|unique:members,email",
            "password" => "required|min:3|required_with:confirm-password|same:confirm-password",
            "confirm-passsword" => "min:3"
        ]);
    }

    function register(Request $request){
        $this->validator($request);

        $member = new Member();
        $member["username"] = $request["username"];
        $member["email"] = $request["email"];
        $member["password"] = Hash::make($request["password"]);
        
        $member->save();

        return redirect("login");
    }
}
