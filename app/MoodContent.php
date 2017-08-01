<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoodContent extends Model
{
    protected $table='moodcontent';
    protected $timestamp=true;

    public function moodContentTags()
    {
        return $this->hasMany('App\MoodContentTag','moodcontent_id');
    }
}
