<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('notify', 'PollController@sendNotification');

Route::post('contactPost', 'ContactController@send');

Route::post('profilepics', 'ContactController@upload');

Route::group(['middleware' => ['authmiddleware']], function () {
    Route::get('admin',function (){
        return view('admin');
    });
    Route::resource('member', 'memberController');
    Route::resource('committe', 'committeController');
    Route::resource('acts', 'actsController');
    Route::resource('bills', 'billsController');
    Route::resource('attendance', 'AttendanceController');
    Route::resource('newsfeed', 'NewsFeedController');
    Route::resource('polls','PollController');
    Route::resource('user','UserController');
    Route::post('comment','PollController@deleteComment');
    Route::post('sessionattendance','AttendanceController@showSession');
    Route::get('deleteatt','AttendanceController@delete');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@check');
    Route::get('logout', 'LoginController@logout');
});