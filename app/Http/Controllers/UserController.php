<?php
namespace App\Http\Controllers;
use App\Manager\UserManager;
use App\Model\Department;
use App\Model\Mood;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Model;
use App\Model\Company;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
//        $user = UserManager::mapper(1);
//        return response()->json($user->getNameWithSurname());
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isManager != null)
        {
            User::createNewUserAction(
                $request->name,
                $request->surname,
                $request->email,
                $request->password,
                $request->position,
                $request->avatar,
                $request->departmentId,
                $request->companyId,
                $request->isManager );
        }
        return response()->json("User Created");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $password = $request->password;
        $avatar = $request->avatar;
        $position = $request->position;
        $companyName = $request->companyName;
        $companyLogo =$request->companyLogo;
        $user = UserManager::createNewManagerAction(
            $name,
            $surname,
            $email,
            $password,
            $position,
            $avatar,
            $companyName,
            $companyLogo);
        return response()->json($user->getNameWithSurname());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
}
