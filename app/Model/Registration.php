<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Model\Registration;

class Registration extends Model
{
    protected $table = 'registration';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id', 'id');
    }

    public static function getRegistrationByUserId($userId)
    {
        return $userToken = Registration::all()
            ->where("user_id", $userId)
            ->first();
    }

    public static function getRegistrationIdByToken($token)
    {
        return $registration = Registration::all()
            ->where("token", $token)
            ->first();
    }

    public static function createNewToken($userId)
    {
        $token = new Registration();
        $token->token = str_random(32);
        $token->user_id = $userId;
        $token->expiration_time = Carbon::now()->addHours(8);
        $token->save();
        return $token;
    }
}
