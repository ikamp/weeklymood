<?php

namespace App\Manager;
use App\Model\Company;
use App\Entity\CompanyEntity;
use App\Model\User;

class CompanyManager
{
    public static function mapper(Company $companyModel)
    {
        $company = new CompanyEntity();
        $company->setId($companyModel->id);
        $company->setName($companyModel->name);
        $company->setLogo($companyModel->logo);
        $company->setUsers(self::getThisCompanyMembersAction($company->getId()));
        $company->setManager(self::getThisCompanyManagerAction($company->getId()));
        return $company;
    }

    /**
     * @param $companyId
     * @return array static
     */
    protected static function getThisCompanyMembersAction($companyId)
    {
        $usersMapped = [];
        $i = 0;
        $users = User::all()->where('company_id', '=', $companyId);
        foreach ($users as $user)
        {
          $usersMapped[$user->name] = [
              'name' => $user->name,
              'surname' => $user->surname,
              'email' => $user->position,
              'avatar' => $user->avatar,
              'isManager' => $user->is_manager
          ];
        }
        return $usersMapped;
    }

    protected static function getThisCompanyManagerAction($companyId)
    {
        $manager = User::all()
            ->where('company_id', '=' ,$companyId )
            ->where('is_manager' , '=' , true);
        return  $manager;
    }

}
