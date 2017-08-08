<?php
namespace App\Manager;

use App\Entity\UserEntity;
use App\Model\Company;
use App\Model\Mood;
use App\Model\MoodContent;
use App\Model\Registration;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class UserManager
{
    /**
     * @param $_user
     * @return UserEntity
     */
    public static function mapper($_user)
    {
        $_user = self::getUserByIdAction($_user);
        $user = new UserEntity();
        $user->setId($_user->id);
        $user->setName($_user->name);
        $user->setSurname($_user->surname);
        $user->setEmail($_user->email);
        $user->setPassword($_user->password);
        $user->setPosition($_user->position);
        $user->setAvatar($_user->avatar);
        $user->setDepartmentId($_user->department_id);
        $user->setCompanyId($_user->company_id);
        $user->setIsManager($_user->is_manager);
        $user->setIsActive($_user->remember_token);
        $user->setMoods(self::getUserMoodsAction($_user->id));
        $user->setMoodAvg(floor(self::getUserMoodAvgAction($_user->id)));

        return $user;
    }

    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public static function getUserByIdAction($userId)
    {
        return User::find($userId);
    }

    public static function getUserByEmailAction($email)
    {
        return User::all()->where('email', $email)->first();
    }

    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public static function getUserCompanyAction($userId)
    {
        $user = self::getUserByIdAction($userId);
        $companyid = $user->company_id;
        $company = Company::getCompanyByIdAction($companyid);
        return $company;
    }

    public static function getUserMoodsAction($userId)
    {
        $moods = [];
        $moodContent = MoodContent::all()->where('user_id', $userId);
        foreach ($moodContent as $item)
        {
            $moods[] += Mood::find($item->mood_id)->value;

        }
        return $moods;
    }
    public static function getUserMoodAvgAction($userId)
    {
        $moodAvg = 0;
        $moods = self::getUserMoodsAction($userId);
        if (count($moods) != 0) {
            $moodAvg = array_sum($moods) / count($moods);
        }
        return $moodAvg;
    }

    public static function createNewManagerAction(
        $name,
        $surname,
        $email,
        $password,
        $companyName,
        $companyLogo)
    {
        $user = new User();
        $user->is_manager = true;
        $user->department_id = null;
        $user->is_active = false;
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->position = null;
        $user->avatar = null;
        $company = CompanyManager::createNewCompanyAction($companyName, $companyLogo);
        $user->company_id = $company->id;
        $user->save();
        $token = Registration::createNewToken($user->id);
        \Mail::to($user)->send(new \App\Mail\RegistrationMailService($user, $token));
        return self::mapper($user->id);
    }


}
