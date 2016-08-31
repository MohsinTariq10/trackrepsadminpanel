<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('member', 'memberController');
Route::resource('committe', 'committeController');
Route::resource('acts', 'actsController');
Route::resource('bills', 'billsController');

Route::post('contactPost', 'ContactController@send');


Route::group(['middleware' => ['web']], function () {
    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@check');
});