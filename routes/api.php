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
    Route::get('/user/mood/all', 'UserController@getAllUserMoods');
    Route::get('/user/mood/level', 'UserController@getUserMoodLevel');
    Route::get('/user/mood/last', 'UserController@getLastMoods');

    Route::group(['middleware' => ['managerControl']], function()
    {
        Route::get('/company/users/count', 'CompanyController@companyUsersTotalCountAction');
        Route::get('/company/user/all', 'CompanyController@allCompanyUserAction');
        Route::post('/company/user/new', 'CompanyController@mailToNewCompanyUser');
        Route::get('/company/users/mood/avg', 'CompanyController@getCompanyUsersMoodAvgAction');
        Route::get('/company/users/mood/weekly/avg', 'CompanyController@getCompanyUsersMoodWeeklyAvgAction');
        Route::get('/company/users/voted', 'CompanyController@votedUsersCountAction');
        Route::get('/company/total/tag', 'CompanyController@getUsersTotalTags');
    });
});

Auth::routes();
Route::post('/registration', 'UserController@registration');
Route::get('/init', 'HomeController@init');
Route::post('/register', 'UserController@store');
Route::post('/password-reset', 'UserController@passwordReset');
Route::post('/password-reset-mail', 'UserController@passwordResetMail');
Route::get('/logout', 'UserController@logout');
