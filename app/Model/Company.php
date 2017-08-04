<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    public $timestamps = false;
    public function users()
    {
        return $this->belongsTo('App\Model\User','user_id','id');
    }

    public static function getAllCompanyAction()
    {
        return Company::all();
    }

    public static function getCompanyByIdAction($companyid)
    {
        return Company::find($companyid);
    }

    public static function getThisCompanyManagerAction($companyid)
    {
        $manager = User::all()->where('company_id', '=' ,$companyid )
            ->where('is_manager' , '=' , true);
        dd($manager);

        return  $manager;
    }

    public static function listAllCompaniesAction()
    {
        $companies = Company::all();
        return $companies;
    }

    /**
     * @param $companyId
     * @return array static
     */
    public static function getThisCompanyMembersAction($companyId)
    {
        $users = User::all()->where('company_id', '=', $companyId);
        return $users;
    }

    public static function updateCompanyAction($companyId, $name, $logo)
    {
        $_company = Company::getCompanyByIdAction($companyId);
        $_company->name = $name;
        $_company->logo = $logo;
        $_company->save();

    }
}
