<?php

namespace App\Manager;

use App\Model\Company;
use App\Entity\CompanyEntity;
use App\Model\MoodContent;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\View\Compilers\Compiler;
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
        $company->setCompanyUsersMoods(self::companyUsersMoodWeeklyAvgAction($company->getId()));
        $company->setWeeklyPercentUserDatas(self::weeklyPercentData($company->getId()));
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
        foreach ($users as $user) {
            $usersMapped[$user->name] = [
                'id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'isManager' => $user->is_manager,
                'createDate' => Carbon::parse($user->created_at)->format('Y-m-d h:m:s')
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
        $companyUsers = User::all()->where('company_id', $companyId);
        $companyUsersMoods = [];
        $companyUsersTotalMood = 0;
        foreach ($companyUsers as $user) {
            $userMoods = UserManager::getUserMoodsAction($user->id);
            foreach ($userMoods as $item) {
                $companyUsersMoods[] += $item;
                $companyUsersTotalMood += $item;
            }

        }
        try {
            $sizeOftheCompanyUsers = sizeof($companyUsersMoods);
            $totalMoodAvg = $companyUsersTotalMood / $sizeOftheCompanyUsers;

        } catch (Exception $exception) {
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
            ->where('company_id', $companyId)
            ->where('is_manager', true)->first();
        return $manager->name;
    }

    public static function companyUsersMoodWeeklyAvgAction($companyId)
    {
        $users = self::getThisCompanyMembersAction($companyId);
        $lastWeekToday = Carbon::today()->subWeek(4);
        $today = Carbon::today();
        $today = Carbon::parse($today)->format('Y-m-d h:m:s');
        $lastWeekToday::parse($lastWeekToday)->format('Y-m-d h:m:s');
        $getCompanyWeeklyMood = [];
        foreach ($users as $user) {
            $getCompanyWeeklyMood[] = MoodContent::where('user_id', $user['id'])
                ->where('created_at', '>', $lastWeekToday)
                ->where('created_at', '<=', $today)
                ->get()->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('w');
                });
        }
        return $getCompanyWeeklyMood;
    }

    public static function weeklyPercentData($companyId)
    {
        $dataUsers = CompanyManager::getThisCompanyMembersAction($companyId);
        $votedUsers = [];
        $lastWeekToday = Carbon::today()->subWeek(1);
        $lastWeekToday=Carbon::parse($lastWeekToday)->format('Y-m-d h:m:s');
        foreach ($dataUsers as $user) {
            $votedUsers[] = MoodContent::where('user_id',  $user['id'])
                ->where('created_at', '>', $lastWeekToday)
                ->get();

        }
        return sizeof($votedUsers);
    }
}
