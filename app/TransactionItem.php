<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    public function Transaction(){
        return $this->belongsTo(Transaction::class,"transactionId");
    }

    public function Shoe(){
        return $this->belongsTo(Shoe::class,"shoeId");
    }
}
