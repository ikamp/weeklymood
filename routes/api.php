<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api'], function()
{
    Route::resource('user','UserController');
    Route::resource('tag','TagController');
    Route::resource('mood','MoodContent');
    Route::resource('company','CompanyController');
    Route::get('/company/user/all', 'CompanyController@allCompanyUserAction');
    Route::get('/init', 'HomeController@init');
    Route::post('/registration', 'UserController@registration');
    Route::get('/user/mood/all', 'UserController@getAllUserMoods');
    Route::get('/user/mood/level', 'UserController@getUserMoodLevel');
});

Auth::routes();
Route::post('/register', 'UserController@store');
Route::post('/password-reset', 'UserController@passwordReset');
Route::post('/password-reset-mail', 'UserController@passwordResetMail');
Route::get('/logout', 'UserController@logout');
