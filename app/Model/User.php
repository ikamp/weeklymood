<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne('Model\Department','id','department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moodContents()
    {
        return $this->hasMany('Model\MoodContent','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('Model\Company','id','company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllUsersAction()
    {
        return User::all();
    }

    /**
     *
     */
    public static function createNewUserAction()
    {

    }

    /**
     * @param $userid
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function getUserByIdAction($userid)
    {
        return User::find($userid);
    }

    /**
     * @param $userid
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function getThisUserCompanyAction($userid)
    {
        $user = self::getUserByIdAction($userid);
        $companyid = $user->company_id;
        $company = Company::getCompanyByIdAction($companyid);
        return $company;
    }

    public static function updateThisUserAction(User $user)
    {

    }

    /**
     * @param User $user
     * Delete This User!
     */
    public static function destroyThisUserById(User $user)
    {
        User::delete();
    }

}
