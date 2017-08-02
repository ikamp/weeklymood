<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tag';
    protected $timestamp=false;

    public function moodContentTags()
    {
        return $this->hasMany('Model\MoodContentTag','tag_id');
    }
}
