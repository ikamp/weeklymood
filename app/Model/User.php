<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model  implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'user';
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne('App\Model\Department','id','department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moodContents()
    {
        return $this->hasMany('App\Model\MoodContent','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('App\Model\Company','id','company_id');
    }

    public function token()
    {
        return $this->hasOne('App\Model\Token','user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllUsersAction()
    {
        return User::all();
    }


    /**
     * @param $name string
     * @param $surname string
     * @param $email string
     * @param $password string
     * @param $position mixed
     * @param $avatar string
     * @param $departmentId integer
     * @param $companyId integer
     * @param $isManager boolean
     * @return User
     */
    public static function createNewUserAction(
        $name,
        $surname,
        $email,
        $password,
        $position,
        $avatar,
        $departmentId,
        $companyId,
        $isManager )
    {
        $user = new User();
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->password = $password;
        $user->position = $position;
        $user->avatar = $avatar;
        $user->department_id = $departmentId;
        $user->company_id = $companyId;
        $user->is_manager = $isManager;
        self::saveThisUserAction($user);
        return $user;
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

    /**
     * @param User $user
     */
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

    /**
     * @param User $user
     * Save The User
     */
    public static function saveThisUserAction(User $user)
    {
        $user->save();
    }


}
