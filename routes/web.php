<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return redirect('/admin');
});

Route::get('/admin', function() {
    return redirect('/client');
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/client', 'CustomerController');
    Route::resource('/voiture', 'CarsController');
    Route::resource('/bon', 'TicketsController');
    Route::resource('/clock', 'ClocksController');
});
