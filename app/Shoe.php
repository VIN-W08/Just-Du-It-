<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    public function CartItem(){
        return $this->belongsTo(CartItem::class);
    }
}
