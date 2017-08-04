<?php

namespace App\Entity;

use App\Model\Company;

class CompanyEntity
{
    private $id;
    private $name;
    private $logo;
    private $companyUsers = [];

    /**
     * @return array
     */
    public function getCompanyUsers()
    {
        return $this->companyUsers;
    }

    /**
     * @param array $companyUsers
     */
    public function setCompanyUsers($companyUsers)
    {
        $this->companyUsers = $companyUsers;
    }

    /**
     * @return integer
     **/
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Update The Company
     */
    public function UpdateCompany()
    {
        Company::updateCompanyAction($this->getId(),$this->getName(),$this->getLogo());
    }

}