<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $timestamp=true;

    public function department()
    {
        return $this->hasOne('App\Department','id','department_id');
    }

    public function moodContents()
    {
        return $this->hasMany('App\MoodContent','user_id');
    }
    public function company()
    {
        return $this->hasOne('App\Company','id','company_id');
    }

}
