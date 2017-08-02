<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $table = 'mood';
    public $timestamps = false;

    public function  moodContent()
    {
        return $this->hasOne('Model\MoodContent','id','mood_id');
    }
}
