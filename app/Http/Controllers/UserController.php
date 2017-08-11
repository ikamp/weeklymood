<?php

namespace App\Http\Controllers;

use App\Manager\CompanyManager;
use App\Manager\UserManager;
use App\Model\Department;
use App\Model\Mood;
use App\Model\MoodContentTag;
use App\Model\Registration;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Model;
use App\Model\Company;
use App\Mail;
use Mockery\Exception;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $userId = Auth::id();
        $user = UserManager::mapper($userId);
        return response()->json($user->getNameWithSurname());
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isManager != true) {
            User::createNewUserAction(
                $request->name,
                $request->surname,
                $request->email,
                $request->password,
                $request->position,
                $request->avatar,
                $request->departmentId,
                $request->companyId,
                $request->isManager);
        }
        return response()->json("User Created");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $password = $request->password;
        $avatar = "null";
        $position = "null";
        $companyName = $request->companyName;
        $companyLogo = "null";
        $user = UserManager::createNewManagerAction(
            $name,
            $surname,
            $email,
            $password,
            $companyName,
            $companyLogo);
        return response()->json($user->getNameWithSurname());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::getUserByIdAction($id);
        return response()->json($user);
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
        User::destroyThisUserById($id);
        return response()->json('Deleted This User');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json('logout');
    }

    public function passwordReset(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        $user = UserManager::getUserByEmailAction($email);
        $userRegistration = Registration::getRegistrationByUserId($user->id);
        $userToken = $userRegistration->token;
        if ($token === $userToken) {
            $newPassword = $request->newPassword;
            $confirmNewPassword = $request->confirmNewPassword;
            if ($newPassword === $confirmNewPassword) {
                $password = bcrypt($newPassword);
            } else {
                $password = $user->password;
            }
            $user->password = $password;
            $user->save();
        }
    }

    public function passwordResetMail(Request $request)
    {
        $email = $request->email;
        $user = UserManager::getUserByEmailAction($email);
        $userId = $user->id;
        $registration = Registration::createNewToken($userId);
        $registration->save();
        $token = $registration->token;
        \Mail::to($email)->send(new \App\Mail\PasswordResetMailService($user, $registration));
    }

    public function registration(Request $request)
    {
        $token = $request->token;
        $userId = Registration::getRegistrationIdByToken($token)->user_id;
        $user = UserManager::getUserByIdAction($userId);
        $user->is_active = 'TRUE';
        $user->save();
    }

    /**
     *
     */
    public function getAllUserMoods()
    {
        $userId = Auth::id();
        $user = UserManager::mapper($userId);
        return response($user->getMoods());
    }

    public function getUserMoodLevel()
    {
        $userId = Auth::id();
        $user = UserManager::mapper($userId);
        return response($user->getMoodAvg());
    }

    public function getLastMoods()
    {
        $userId = Auth::id();
        $user = UserManager::mapper($userId);
        return response($user->getLastMoods());
    }

    public function sendWeeklyMail()
    {
        $managerId = Auth::id();
        $manager = UserManager::mapper($managerId);
        $companyId = $manager->getCompanyId();
        $userList = CompanyManager::getThisCompanyMembersAction($companyId);
        foreach ($userList as $user) {
            $email = $user['email'];
            \Mail::to($email)->send(new \App\Mail\WeeklyMailService);
        }
    }

    public function deleteUser(Request $request)
    {
        $userId = $request->userId;
        $user = UserManager::getUserByIdAction($userId);
        $isManager = $user['is_manager'];
        if ($isManager !== true) {
            $user->delete();
            return $user;
        }
    }

    public function managerChecker()
    {
        $userId = Auth::id();
        $user = UserManager::mapper($userId);
        return response()->json($user->getIsManager());
    }
}
