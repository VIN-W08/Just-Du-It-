<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCartController extends Controller
{
    function viewCart(){
        $memberId = Auth::id();
        // $shoesId = array();
        // $shoesQty = array();

        // $carts = Cart::where("memberId","=",$memberId)->get();
        // foreach($carts as $cart){
        //     array_push($shoesId,$cart->shoeId);
        //     array_push($shoesQty,$cart->quantity);
        // }
        // $shoes = Shoe::whereIn("shoeId",$shoesId)->get();
        // for($idx = 0; $idx < count($shoes); $idx++){
        //     $shoes[$idx]->quantity = $shoesQty[$idx];
        // }
        // $carts = Cart::where("memberId","=",$memberId)->get();
        // dd($carts);
        // return view("my-layouts.cart",["carts" => $carts]);
        // return view("my-layouts.cart",["shoes" => $shoes]);
        $cart = Cart::where("memberId","=",$memberId)->first();
        $items = CartItem::where("cartId","=",$cart->cartId)->get();
        dd($items[0]->Shoe);
        // $shoes = Shoe::whereIn("shoeId",$items->shoeId)->get();
        // dd($items[0]->Shoe->name);
        // dd($items[0]->Shoe);
        return view("my-layouts.cart",["items" => $items]);
    }
    
    function addToCart(Request $request){
        $memberId = Auth::id();
        $shoeId = $request->input("shoeId");
        $quantity = $request->input("quantity");

        $cart = new Cart();
        $cart["memberId"] = $memberId;
        $cart->save();

        $selected_cart = Cart::where("memberId","=",$memberId)->first();
        $cartItem = new CartItem();
        $cartItem["cartId"] = $selected_cart->cartId;
        $cartItem["shoeId"] = $shoeId;
        $cartItem["quantity"] = $quantity;
        $cartItem->save();

        return redirect("home");
    }
}
