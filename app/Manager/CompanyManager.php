<?php

namespace App\Manager;
use App\Model\Company;
use App\Entity\CompanyEntity;

class CompanyManager
{
    public static function mapper(Company $companyModel)
    {
        $company = new CompanyEntity();
        $company->setId($companyModel->id);
        $company->setName($companyModel->name);
        $company->setLogo($companyModel->logo);
        $company->setCompanyUsers($companyModel::getThisCompanyMembersAction($company->getId()));
        return $company;
    }

}