<?php

namespace App\Manager;
use App\Model\Company;
use App\Entity\CompanyEntity;
use App\Model\User;

class CompanyManager
{
    public static function mapper($companyId)
    {
        $_company = self::getThisCompanyByIdAction($companyId);
        $company = new CompanyEntity();
        $company->setId($_company->id);
        $company->setName($_company->name);
        $company->setLogo($_company->logo);
        $company->setUsers(self::getThisCompanyMembersAction($company->getId()));
        $company->setManager(self::getThisCompanyManagerAction($company->getId()));
        return $company;
    }

      /**
     * @param $companyId
     * @return array static
     */
    public static function getThisCompanyMembersAction($companyId)
    {
        $usersMapped = [];
        $users = User::all()->where('company_id',$companyId);
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

    public static function getThisCompanyManagerAction($companyId)
    {
        $manager = User::where('company_id' ,$companyId )
            ->where('is_manager' ,true)
        ->first();
        return  $manager;
    }

    public static function createNewCompanyAction($name, $logo)
    {
        $company = new Company();
        $company->name = $name;
        $company->logo = $logo;
        $company->save();
        return $company;
    }

    public static function getThisCompanyByIdAction($companyId)
    {
        return Company::find($companyId);
    }

    public static function listAllCompaniesNameAction($companyId)
    {
        $company = [];
        $companies = Company::all();
        foreach ($companies as $comp)
        {
        }
    }
}
