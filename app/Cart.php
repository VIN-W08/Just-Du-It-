<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function CartItem(){
        return $this->hasMany(CartItem::class,"id");
    }
}
