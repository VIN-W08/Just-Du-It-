<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyTransactionController extends Controller
{
    function viewTransaction(){
        return view("my-layouts.transaction");
    }
}
