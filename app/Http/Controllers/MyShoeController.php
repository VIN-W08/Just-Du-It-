<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;

class MyShoeController extends Controller
{
    function viewShoes(Request $request){
        
        $search = $request->input("search");
        $shoes = Shoe::where("name","like","%$search%")->paginate(6);
        //dd($shoes);
        return view("my-layouts.home",["shoes" => $shoes]);
    }

    function showDetail(Request $request){
        $id = $request->input("shoeId");
        $shoe = Shoe::where("shoeId","=",$id)->first();

        return view("my-layouts.shoe-detail",["shoe" => $shoe]);
    }

    function goToCart(Request $request){
        $shoeId = $request->input("shoeId");
        $shoe = Shoe::where("shoeId","=",$shoeId)->first();
        
        return view("my-layouts.add-to-cart",["shoe" => $shoe]);
    }   
}
