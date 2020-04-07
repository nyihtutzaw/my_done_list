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

Route::get('/',"LoginController@index");
Route::post('/login',"LoginController@login");


Route::middleware('user.auth')->group(function() {

    Route::name("logout")->get('/logout',"LoginController@logout");

    Route::name('home.')->prefix('home')->group(function() {
        Route::get('/',"HomeController@index");
    });
});

