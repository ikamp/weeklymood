<?php

namespace App\Manager;
use App\Model\Company;
use App\Entity\CompanyEntity;
use App\Model\User;
use Mockery\Exception;

class CompanyManager
{
    public static function mapper($_companyId)
    {
        $_company = self::getCompanyById($_companyId);
        $company = new CompanyEntity();
        $company->setId($_company->id);
        $company->setName($_company->name);
        $company->setLogo($_company->logo);
        $company->setUsers(self::getThisCompanyMembersAction($company->getId()));
        $company->setManager(self::getThisCompanyManagerAction($company->getId()));
        $company->setAllMoodsAvg(self::getCompanyUsersMoodsAvgAction($company->getId()));
        return $company;
    }

      /**
     * @param $companyId
     * @return array static
     */
    public static function getThisCompanyMembersAction($companyId)
    {
        $usersMapped = [];
        $i = 0;
        $users = User::all()->where('company_id', '=', $companyId);
        foreach ($users as $user)
        {
          $usersMapped[$user->name] = [
              'name' => $user->name,
              'surname' => $user->surname,
              'email' => $user->email,
              'avatar' => $user->avatar,
              'isManager' => $user->is_manager
          ];
        }
        return $usersMapped;
    }



    public static function createNewCompanyAction($name, $logo)
    {
        $company = new Company();
        $company->name = $name;
        $company->logo = $logo;
        $company->save();
        return $company;
    }

    public static function getCompanyUsersMoodsAvgAction($companyId)
    {
        $companyUsers = User::all()->where('company_id',$companyId);
        $companyUsersMoods = [];
        $companyUsersTotalMood = 0;
        foreach ($companyUsers as $user)
        {
            $userMoods = UserManager::getUserMoodsAction($user->id);
            foreach ($userMoods as $item)
            {
                $companyUsersMoods[] += $item;
                $companyUsersTotalMood += $item;
            }

        }
        try
        {
        $sizeOftheCompanyUsers = sizeof($companyUsersMoods);
        $totalMoodAvg = $companyUsersTotalMood / $sizeOftheCompanyUsers;

        }catch (Exception $exception)
        {
            return response()->json($exception->getMessage());
        }
        return $totalMoodAvg;
    }

    public static function getCompanyById($companyId)
    {
        $company = Company::find($companyId);
        return $company;
    }

    public static function getThisCompanyManagerAction($companyId)
    {
        $manager = User::all()
            ->where('company_id' ,$companyId )
            ->where('is_manager' ,true)->first();
        return  $manager->name;
    }
}
