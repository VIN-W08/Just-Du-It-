<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Transaction;
use App\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCartController extends Controller
{
    function viewCart(){
        $memberId = Auth::id();
        $cart = Cart::where("memberId","=",$memberId)->first();
        if($cart != null){
            $items = CartItem::where("cartId","=",$cart->id)->get();
        }
        if($cart!=null && !$items->isEmpty()){
            return view("my-layouts.cart",["items" => $items,"cartId"=>$cart->id]);
        }
        return view("my-layouts.cart");
    }
    
    function createCartAndItem(Request $request){
        $memberId = Auth::id();
        $shoeId = $request->input("shoeId");
        $quantity = $request->input("quantity");

        $cart = Cart::where("memberId","=",$memberId)->first();

        if($cart == null){
            $cart = new Cart();
            $cart["memberId"] = $memberId;
            $cart->save();
        }

        $cartItem = new CartItem();
        $cartItem["cartId"] = $cart->id;
        $cartItem["shoeId"] = $shoeId;
        $cartItem["quantity"] = $quantity;
        $cartItem->save();

        return redirect("home");
    }

    function editCart(Request $request){
        $itemId = $request->input("itemId");
        $item = CartItem::find($itemId);

        return view("my-layouts.edit-cart",["item"=>$item]);
    }

    function updateCart(Request $request){
        $itemId = $request->input("itemId");
        $qty = $request->input("quantity");

        $item = CartItem::find($itemId);
        $item->quantity = $qty;
        $item->save();
        
        return redirect("view-cart");
    }

    function deleteItem(Request $request){
        $itemId = $request->input("itemId");

        $item = CartItem::find($itemId);
        $item->delete();
        
        return redirect("view-cart");
    }

    function checkOut(Request $request){
        $cartId = $request->input("cartId");
        
        $items = CartItem::where("cartId","=",$cartId)->get();

        $totalPrice = 0;
        $transaction = new Transaction();
        $transaction["memberId"] = Auth::id();
        $transaction["totalPrice"] = $totalPrice;
        $transaction->save();

        foreach($items as $item){
            $transactionItem = new TransactionItem();
            $transactionItem["transactionId"] = $transaction->id;
            $transactionItem["shoeId"] = $item->Shoe->id;
            $transactionItem->save();
            $totalPrice = $totalPrice + ($item->Shoe->price * $item->quantity);
        }

        $transaction["totalPrice"] = $totalPrice;
        $transaction->save();
        
        CartItem::where("cartId","=",$cartId)->delete();

        return redirect("view-cart");
    }
}
