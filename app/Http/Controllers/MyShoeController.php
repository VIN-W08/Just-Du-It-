<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MyShoeController extends Controller
{
    function viewShoes(Request $request){
        
        $search = $request->input("search");
        $shoes = Shoe::where("name","like","%$search%")->paginate(6);
    
        return view("my-layouts.home",["shoes" => $shoes]);
    }

    function showDetail(Request $request){
        $id = $request->input("shoeId");
        $shoe = Shoe::where("id","=",$id)->first();

        return view("my-layouts.shoe-detail",["shoe" => $shoe]);
    }

    function addToCart(Request $request){
        $shoeId = $request->input("shoeId");
        $shoe = Shoe::where("id","=",$shoeId)->first();
        
        return view("my-layouts.add-to-cart",["shoe" => $shoe]);
    }

    function addShoe(){
        return view("my-layouts.add-shoe");
    }

    function uploadShoeValidator(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|gte:100",
            "image" => "required|image"
        ]);
    }

    function uploadShoe(Request $request){
        $this->uploadShoeValidator($request);
        
        $shoe = new Shoe();
        $shoe["name"] = $request["name"];
        $shoe["price"] = $request["price"];
        $shoe["description"] = $request["description"];
        $shoe["image"] = $request["image"]->getClientOriginalName();

        $request->file("image")->move(public_path("/images"),$request->file('image')->getClientOriginalName());
        $shoe->save();
        
        return redirect()->back();
    }

    public function updateShoe(Request $request){
        $shoeId = $request->input("shoeId");
        $shoe = Shoe::find($shoeId);

        return view("my-layouts.update-shoe",["shoe"=>$shoe]);
    }

    function updateShoeValidator(Request $request){
        // dd($request);
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
        ]);
    }

    public function makeUpdateShoe(Request $request){
        $this->updateShoeValidator($request);

        $shoeId = $request->input("shoeId");
        $shoe = Shoe::find($shoeId);
        
        $shoe->name = $request->input("name");
        $shoe->price = $request->input("price");
        $shoe->description = $request->input("description");

        if($request->file("image") != null){
            $shoe->image = $request->file("image")->getClientOriginalName();
            $request->file("image")->move(public_path("/images"),$request->file('image')->getClientOriginalName());
        }

        $shoe->save();

        return redirect()->back()->withInput();
    }
}
