<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoodContent extends Model
{
    protected $table='moodcontent';
    protected $timestamp=true;

    public function moodcontenttags()
    {
        return $this->hasMany('App\MoodContentTag','moodcontent_id');
    }
}
