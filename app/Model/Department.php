<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    public $timestamps = false;

    public static function getAllDepartmentsAction()
    {
        $departments = Department::all();
        return $departments;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function findDepartmentByIdAction($id)
    {
        $department = Department::find($id);
        return $department;
    }

    /**
     * @param $departmentId
     * @return static
     */
    public static function getThisDepartmentsUsersAction($departmentId)
    {
        $totalUsers = User::all()->where('department_id' , '=' , $departmentId);
        return $totalUsers;
    }
}


