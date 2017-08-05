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
    Route::get('/init', 'HomeController@init');
    Route::get('company/users/{companyId}', 'CompanyController@companyUsers');
});
Auth::routes();

Route::post('/api/register', 'UserController@store');
Route::get('/home', 'HomeController@index')->name('home');
