<?php

namespace App\Http\Controllers;
use App\Manager\CompanyManager;
use App\Model\Company;
use App\Model\User;
use App\Entity\companyEntity;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * @param $companyId integer
     * @return \Illuminate\Http\JsonResponse
     */
    public function companyUsers($companyId)
    {
        $userId = Auth::user()->getAuthIdentifier();
        $userCompanyID = User::getThisUserCompanyAction($userId)->id;

        if ($userCompanyID == $companyId)
        {
            $company = CompanyManager::mapper(Company::getCompanyByIdAction($companyId));

            return response()->json($company->getusers());
        }
        return response()->json(401);
    }
}

