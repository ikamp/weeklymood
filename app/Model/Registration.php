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
        return $this->belongsTo('App\Model\User','user_id','id');
    }

    public static function getByUserId($user_id)
    {
        return $userToken = Registration::with('user')
            ->where("user_id", $user_id)
            ->first();
    }

    public static function createNewToken($user_id)
    {
        $token = new Registration();
        $token->token = str_random(32);
        $token->user_id = $user_id;
        $token->expiration_time = Carbon::now()->addHours(8);
        $token->save();
        return $token;
    }
}
