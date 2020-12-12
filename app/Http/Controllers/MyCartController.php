<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCartController extends Controller
{
    function viewCart(){
        $memberId = Auth::id();
        $cart = Cart::find($memberId);

        $items = CartItem::where("cartId","=",$cart->id)->get();

        return view("my-layouts.cart",["items" => $items]);
    }
    
    function addToCart(Request $request){
        $memberId = Auth::id();
        $shoeId = $request->input("shoeId");
        $quantity = $request->input("quantity");

        $cart = new Cart();
        $cart["memberId"] = $memberId;
        $cart->save();
        
        $my_cart = Cart::find($memberId);

        $cartItem = new CartItem();
        $cartItem["cartId"] = $my_cart->id;
        $cartItem["shoeId"] = $shoeId;
        $cartItem["quantity"] = $quantity;
        $cartItem->save();

        return redirect("home");
    }

    public function goToEditCart(Request $request){
        $itemId = $request->input("itemId");
        $item = CartItem::find($itemId);

        return view("my-layouts.edit-cart",["item"=>$item]);
    }

    public function updateCart(Request $request){
        $itemId = $request->input("itemId");
        $qty = $request->input("quantity");

        $item = CartItem::find($itemId);
        $item->quantity = $qty;
        $item->save();
        
        return redirect("view-cart");
    }

    public function deleteCart(Request $request){
        $itemId = $request->input("itemId");

        $item = CartItem::find($itemId);
        $item->delete();
        
        return redirect("view-cart");
    }
}
