<?php

use Illuminate\Http\Request;

Auth::routes();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api'], function()
{
    Route::resource('user','UserController');
    Route::resource('tag','TagController');
    Route::resource('mood','MoodContent');
    Route::resource('company','CompanyController');
    Route::get('company/users/{companyId}', 'CompanyController@companyUsers');
});

Route::post('/register', 'UserController@store');
Route::get('/logout', 'UserController@logout');

