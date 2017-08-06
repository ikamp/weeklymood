<?php

use App\Mail\WeeklyMailService;
use App\Mail\RegistrationMailService;
use App\Model\User;
use App\Model\Registration;


Route::get('/weeklyMail', function () {

    Mail::to('weeklymood.ikamp@gmail.com')->send(new WeeklyMailService); //localhost:8000/select-your-mood
    return view('emails.weeklyMail');
});

Route::get('/', function () {
    return view('welcome');
});
