<?php

namespace App\Entity;
use App\Manager\CompanyManager;
use App\Manager\UserManager;
use App\Model\Company;
use App\Model\User;

class UserEntity
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $position;
    private $avatar;
    private $departmentId;
    private $departmentName;

    /**
     * @return mixed
     */
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    /**
     * @param mixed $departmentName
     */
    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }
    private $companyId;
    private $isManager;
    private $isActive;
    private $moods = [];
    private $moodAvg;
    private $average;
    private $Comments = [];
    private $lastMoods = [];

    /**
     * @return array
     */
    public function getLastMoods()
    {
        return $this->lastMoods;
    }

    /**
     * @param array $lastMoods
     */
    public function setLastMoods($lastMoods)
    {
        $this->lastMoods = $lastMoods;
    }

    /**
     * @return mixed
     */
    public function getMoodAvg()
    {
        return $this->moodAvg;
    }

    /**
     * @param mixed $moodAvg
     */
    public function setMoodAvg($moodAvg)
    {
        $this->moodAvg = $moodAvg;
    }

    /**
     * @return integer
     */
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
     * @return array
     */
    public function getMoods()
    {
        return $this->moods;
    }

    /**
     * @param array $moods
     */
    public function setMoods($moods)
    {
        $this->moods = $moods;
    }

    /**
     * @return mixed
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * @param mixed $average
     */
    public function setAverage($average)
    {
        $this->average = $average;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->Comments;
    }

    /**
     * @param array $Comments
     */
    public function setComments($Comments)
    {
        $this->Comments = $Comments;
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
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param integer $departmentId
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param integer $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return boolean
     */
    public function getIsManager()
    {
        return $this->isManager;
    }

    /**
     * @param boolean $isManager
     */
    public function setIsManager($isManager)
    {
        $this->isManager = $isManager;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function saveThisUserAction()
    {

    }

    /**
     * @return string
     */
    public function getNameWithSurname()
    {
        return $this->getName().' '.$this->getSurname();
    }

    /**
     * Return user company
     * @return Company
     */
    public function getUserCompany()
    {
        return Company::getCompanyByIdAction($this->getCompanyId());

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public static function destroyThisUserAction($id)
    {
        User::destroy($id);
        return response()->json("deleted");
    }

}