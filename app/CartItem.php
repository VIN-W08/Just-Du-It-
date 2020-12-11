<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function Shoe(){
        return $this->belongsTo(Shoe::class);
    }

    public function Cart(){
        return $this->hasOne(Cart::class);
    }
}
