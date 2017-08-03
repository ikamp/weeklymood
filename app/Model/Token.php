<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'token';
    protected $timestamp = false;

    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id','id');
    }
}
