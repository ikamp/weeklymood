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
    private $AllMoodsAvg;
    private $companyUsersMoods;
    private $weeklyPercentUserDatas;
    private $totalMoods = [];
    private $totalTags = [];

    /**
     * @return array
     */
    public function getTotalTags()
    {
        return $this->totalTags;
    }

    /**
     * @param array $totalTags
     */
    public function setTotalTags($totalTags)
    {
        $this->totalTags = $totalTags;
    }

    /**
     * @return array
     */
    public function getTotalMoods()
    {
        return $this->totalMoods;
    }

    /**
     * @param array $totalMoods
     */
    public function setTotalMoods($totalMoods)
    {
        $this->totalMoods = $totalMoods;
    }

    /**
     * @return mixed
     */
    public function getWeeklyPercentUserDatas()
    {
        return $this->weeklyPercentUserDatas;
    }

    /**
     * @param mixed $weeklyPercentUserDatas
     */
    public function setWeeklyPercentUserDatas($weeklyPercentUserDatas)
    {
        $this->weeklyPercentUserDatas = $weeklyPercentUserDatas;
    }

    /**
     * @return mixed
     */
    public function getCompanyUsersMoods()
    {
        return $this->companyUsersMoods;
    }

    /**
     * @param mixed $companyUsersMoods
     */
    public function setCompanyUsersMoods($companyUsersMoods)
    {
        $this->companyUsersMoods = $companyUsersMoods;
    }

    /**
     * @return mixed
     */
    public function getAllMoodsAvg()
    {
        return $this->AllMoodsAvg;
    }

    /**
     * @param mixed $AllMoodsAvg
     */
    public function setAllMoodsAvg($AllMoodsAvg)
    {
        $this->AllMoodsAvg = $AllMoodsAvg;
    }

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
        Company::updateCompanyAction($this->getId(), $this->getName(), $this->getLogo());
    }

}
