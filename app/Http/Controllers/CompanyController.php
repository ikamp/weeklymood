<?php

namespace App\Http\Controllers;

use App\Manager\CompanyManager;
use App\Manager\UserManager;
use App\Model\Company;
use App\Model\MoodContentTag;
use App\Model\Registration;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = UserManager::mapper($id);
        return response()->json($user->getUserCompany());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = CompanyManager::mapper(Company::getCompanyByIdAction($id));

        return response()->json($company->getName());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allCompanyUserAction()
    {
        $user = Auth::id();
        $user = UserManager::mapper($user);
        $users = CompanyManager::getThisCompanyMembersAction($user->getCompanyId());
        return response()->json($users);
    }

    public function mailToNewCompanyUser(Request $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $companyId = UserManager::getUserByIdAction(Auth::id())->company_id;

        $user = new User();
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->company_id = $companyId;
        $user->is_manager = false;
        $user->is_active = true;
        $user->save();
        $token = Registration::createNewToken($user->id);
        \Mail::to($email)->send(new \App\Mail\InviteUserMailService($user, $token));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanyUsersMoodAvgAction()
    {
        $user = Auth::id();
        $user = UserManager::mapper($user);
        $company = CompanyManager::mapper($user->getCompanyId());
        return response()->json($company->getAllMoodsAvg());
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getCompanyUsersMoodWeeklyAvgAction()
    {
        $id = Auth::id();
        $user = UserManager::mapper($id);
        $company = CompanyManager::mapper($user->getCompanyId());
        return response()->json($company->getCompanyUsersMoods());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function votedUsersCountAction()
    {
        $id = Auth::id();
        $user = UserManager::mapper($id);
        $company = CompanyManager::mapper($user->getCompanyId());
        return response()->json($company->getWeeklyPercentUserDatas());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function companyUsersTotalCountAction()
    {
        $id = Auth::id();
        $user = UserManager::mapper($id);
        $company = CompanyManager::mapper($user->getCompanyId());
        return response()->json(sizeof($company->getusers()));
    }

    public function getUsersTotalTags()
    {
        $userId = Auth::id();
        $company = UserManager::getUserCompanyAction($userId);
        $companyId = $company->id;
        $company = CompanyManager::mapper($companyId);
        return response($company->getTotalTags());
    }

    /**
     * @param Request $request
     */
    public function createMoodwithTag(Request $request)
    {
        $userId = Auth::id();
        $moods = $request->moods;
        $comment = $request->comment['comment'];
        $moodId = 1;
        $tags = $request->tags;
        foreach ($moods as $item) {
            if ($item == 1) {
                $moodId = 1;
            } elseif ($item == 2) {
                $moodId = 2;
            } elseif ($item == 3) {
                $moodId = 3;
            } elseif ($item == 4) {
                $moodId = 4;
            } elseif ($item == 5) {
                $moodId = 5;
            }
        }
        $mood = new \App\Model\MoodContent();
        $mood->user_id = $userId;
        $mood->mood_id = $moodId;
        $mood->comment = $comment;
        $mood->save();
        $i = 1;
        foreach ($tags as $item) {
            if ($item == true) {
                $tag = new MoodContentTag();
                $tag->moodcontent_id = $mood->id;
                $tag->tag_id = $i;
                $tag->save();
            }
            $i++;
        }
        return response()->json('saved');
    }
}

