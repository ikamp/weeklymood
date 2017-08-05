<?php

use App\Mail\WeeklyMailService;
use App\Mail\RegistrationMailService;


Route::get('/weeklyMail', function () {

    Mail::to('weeklymood.ikamp@gmail.com')->send(new WeeklyMailService); //localhost:8000/select-your-mood
    return view('emails.weeklyMail');
});

Route::get('/registrationMail', function () {

    Mail::to('weeklymood.ikamp@gmail.com')->send(new RegistrationMailService); //localhost:8000/activate-your-account
    return view('emails.registrationMail');
});

Route::get('/', function () {
    return view('welcome');
});
