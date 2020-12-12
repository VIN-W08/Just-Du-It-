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

Route::get("/home","MyShoeController@viewShoes")->name("home");
Route::get("/detail","MyShoeController@showDetail")->name("detail");
Route::get("/go-to-cart","MyShoeController@goToCart")->name("goToCart");

Route::post("/add-to-cart","MyCartController@addToCart")->name("addToCart");
Route::get("/view-cart","MyCartController@viewCart")->name("viewCart");
Route::get("/go-to-edit-cart","MyCartController@goToEditCart")->name("editCart");
Route::get("/update-cart","MyCartController@updateCart")->name("updateCart");
Route::get("/delete-cart","MyCartController@deleteCart")->name("deleteCart");

Route::get("/view-transaction","MyTransactionController@viewTransaction")->name("viewTransaction");

Route::get("/logout","MyLoginController@logout")->name("logout");