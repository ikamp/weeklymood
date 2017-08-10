<?php

namespace App\Manager;

use App\Model\Company;
use App\Entity\CompanyEntity;
use App\Model\MoodContent;
use App\Model\MoodContentTag;
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
        $company->setTotalTags(self::getTotalTagsAction($company->getusers()));
        return $company;
    }

    /**
     * @param $companyId
     * @return array static
     */
    public static function getThisCompanyMembersAction($companyId)
    {
        $usersMapped = [];
        $users = User::all()->where('company_id', '=', $companyId);
        foreach ($users as $user) {
            $companyUser = UserManager::mapper($user->id);
            $usersMapped[$user->name] = [
                'id' => $companyUser->getId(),
                'name' => $companyUser->getName(),
                'surname' => $companyUser->getSurname(),
                'email' => $companyUser->getEmail(),
                'avatar' => $companyUser->getAvatar(),
                'isManager' => $companyUser->getIsManager(),
                'department' => $companyUser->getDepartmentName(),
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
        $sizeOftheCompanyUsers = sizeof($companyUsersMoods);
        if ($companyUsersMoods > 0 && $sizeOftheCompanyUsers > 0) {
            $totalMoodAvg = $companyUsersTotalMood / $sizeOftheCompanyUsers;
        } else {
            $totalMoodAvg = 0;
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
        $lastWeekToday = Carbon::parse($lastWeekToday)->format('Y-m-d h:m:s');
        foreach ($dataUsers as $user) {
            $votedUsers[] = MoodContent::where('user_id', $user['id'])
                ->where('created_at', '>', $lastWeekToday)
                ->get();

        }
        return sizeof($votedUsers);
    }

    public static function getTotalTagsAction($users)
    {
        {
            $companyTotaltags = [];
            $company = $users;
            foreach ($company as $item) {
                $moodContents = \App\Model\MoodContent::all()->where('user_id', $item['id']);
                foreach ($moodContents as $moodContent) {
                    $userTags = MoodContentTag::all()->where('moodcontent_id', $moodContent['id']);
                    foreach ($userTags as $tag) {
                        array_push($companyTotaltags, $tag->tag_id);
                    }

                }

            }
        }
        return $companyTotaltags;
    }
}
