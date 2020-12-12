<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function TransactionItem(){
        return $this->hasMany(TransactionItem::class,"id");
    }
}
