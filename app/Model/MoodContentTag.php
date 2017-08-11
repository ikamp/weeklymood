<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoodContentTag extends Model
{
    protected $table = 'moodcontenttag';
    public $timestamp = true;
    public function moodcontent()
    {
        return $this->belongsTo('App\Model\MoodContent','moodcontent_id','id');
    }
}
