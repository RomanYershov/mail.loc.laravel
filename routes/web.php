<?php

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
use App\User;

use App\Mail\UserSignedUp;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'activated');

Route::get("/auth/{code}", "ActivationController@auth");

Route::get("/activateAccount", function(){
    return view("activateAccount");
})->middleware('auth');

Route::get("/sendEmail", function(){
    $user=Auth::user();
    $data=["name"=>$user->name, "email"=>$user->email,"activation_code"=>$user->activation_code];
    Mail::to($user->email)->send(new UserSignedUp($data));
})->middleware("auth");
