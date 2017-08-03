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

    public static function getAllMoodsAction()
    {
        $moods = Mood::all();
        return $moods;
    }

    public static function getMoodsByIdAction($id)
    {
        $mood = Mood::find($id);
        return $mood;
    }

    public static function getUserTotalMoodsByIdAction($id)
    {
        $userMoods = MoodContent::all()->where('user_id', '=', $id);
        return $userMoods;
    }

    public static function getUserSelectedStarMoodsAction($userId, $moodId)
    {
        $UsersMoods = MoodContent::all()->where('mood_id','=', $moodId)->where('user_id', '=', $userId);
        return $UsersMoods;
    }





}
