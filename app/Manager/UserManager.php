<?php
namespace App\Manager;

use App\Entity\UserEntity;
use App\Model\User;

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



    protected static function getUserByIdAction($userId)
    {
        return User::find($userId);
    }

}