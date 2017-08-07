<?php
namespace App\Manager;

use App\Entity\UserEntity;
use App\Model\Company;
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
        return $user;
    }

    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    protected static function getUserByIdAction($userId)
    {
        return User::find($userId);
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

    public static function getUserMoodsAction()
    {
        //
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
