<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoodContent extends Model
{
    protected $table='moodcontent';
    protected $timestamp=true;

    public function moodContentTags()
    {
        return $this->hasMany('Model\MoodContentTag','moodcontent_id');
    }
}
