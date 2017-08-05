<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Tests\Formatter\TableCell;

/**
 * Class Tag
 * @package App\Model
 */
class Tag extends Model
{
    protected $table = 'tag';
    protected $timestamp = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moodContentTags()
    {
        return $this->hasMany('Model\MoodContentTag','tag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function listAllTagsAction()
    {
        return Tag::all();
    }

    /**
     * @param $name string
     * @return Tag
     */
    public static function createNewTagAction($name)
    {
        $tag = new Tag();
        $tag->name = $name;
        $tag->save();
        return $tag;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function returnThisTagAction($id)
    {
        return Tag::find($id);
    }

    /**
     * @param $id integer
     * @param $name string
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function updateThisTagAction($id, $name)
    {
        $tag = self::returnThisTagAction($id);
        $tag->name = $name;
        return $tag;
    }

    /**
     * @param $id integer
     * @return string
     */
    public static function deleteThisTagAction($id)
    {
        Tag::destroy($id);
        return 'deleted';
    }
}
