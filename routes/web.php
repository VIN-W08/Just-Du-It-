<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("home");
});

Route::get("/login", "MyLoginController@showLoginForm")->name("login");
Route::post("/login","MyLoginController@login")->name("login");

Route::get("/register", "MyRegisterController@showRegisterForm")->name("register");
Route::post("/register","MyRegisterController@register")->name("register");

Route::get("/home","MyShoeController@viewShoes")->name("home")->middleware("auth");
Route::get("/detail","MyShoeController@showDetail")->name("detail")->middleware("auth");
Route::get("/add-to-cart","MyShoeController@addToCart")->name("addToCart")->middleware("auth");
Route::get("/add-shoe","MyShoeController@addShoe")->name("addShoe")->middleware("auth","admin");
Route::any("/upload-shoe","MyShoeController@uploadShoe")->name("uploadShoe")->middleware("auth","admin");
Route::get("/update-shoe","MyShoeController@updateShoe")->name("updateShoe")->middleware("auth","admin");
Route::any("/make-update-shoe","MyShoeController@makeUpdateShoe")->name("makeUpdateShoe")->middleware("auth","admin");

Route::post("/create-cart-and-item","MyCartController@createCartAndItem")->name("createCartAndItem")->middleware("auth");
Route::get("/view-cart","MyCartController@viewCart")->name("viewCart")->middleware("auth");
Route::get("/edit-cart","MyCartController@editCart")->name("editCart")->middleware("auth");
Route::get("/update-cart","MyCartController@updateCart")->name("updateCart")->middleware("auth");
Route::get("/delete-item","MyCartController@deleteItem")->name("deleteItem")->middleware("auth");
Route::post("/check-out","MyCartController@checkOut")->name("checkOut")->middleware("auth");

Route::get("/view-transaction","MyTransactionController@viewTransaction")->name("viewTransaction")->middleware("auth");

Route::get("/logout","MyLoginController@logout")->name("logout")->middleware("auth");