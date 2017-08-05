<?php

namespace App\Entity;

use App\Model\Company;

class CompanyEntity
{
    private $id;
    private $name;
    private $logo;
    private $users = [];
    private $moods = [];
    private $manager;

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param mixed $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return array
     */
    public function getmoods()
    {
        return $this->moods;
    }

    /**
     * @param array $moods
     */
    public function setmoods($moods)
    {
        $this->moods = $moods;
    }

    /**
     * @return array
     */
    public function getusers()
    {
        return $this->users;
    }

    /**
     * @param array $users
     */
    public function setusers($users)
    {
        $this->users = $users;
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