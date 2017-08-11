<?php

namespace App\Http\Controllers;

use App\Manager\UserManager;
use App\Model\Registration;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function getToken()
    {
        $user = UserManager::getUserByIdAction(Auth::id());
        $newToken = Registration::getByUserId(Auth::id());
        if (Auth::user()->is_active != "true") {
            $newToken->token = str_random(32);
            $newToken->user_id = id;
            $newToken->expirationTime = Carbon::now()->addHours(8);
            $newToken->save();

            Mail::to(Auth::user()->email)->send(new \App\Mail\RegistrationMailService($user, $newToken));
        }
    }

    public function activation($token)
    {
        $newToken = Registration::getByUserId(Auth::id())->token;

        if ($newToken == $token) {
            $user = Auth::user();
            $user->is_active = "true";
            $user->save();
            return redirect('/#/dashboard');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
}
