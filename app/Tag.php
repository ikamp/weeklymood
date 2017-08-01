<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tag';
    protected $timestamp=false;

    public function moodcontenttags()
    {
        return $this->hasMany('App\MoodContentTag','tag_id');
    }
}
