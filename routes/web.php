<?php

use App\Mail\WeeklyMailService;
use App\Mail\RegistrationMailService;
use App\Model\User;
use App\Model\Registration;

Route::get('/', function () {
    return view('welcome');
});
