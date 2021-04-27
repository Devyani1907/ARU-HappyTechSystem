<?php namespace App\Models;
 
use CodeIgniter\Model;

class EmployeeDetailModel extends Model
{
    protected $table = "employeedetail";
    protected $allowedFields = ["EmployeeId", "EmployeeName","EmployeeCode","UserName","Password","RoleId"];

    function GetAllEmployee()
    {
        return $this->findAll();
    }

    function GetEmployeeByUsername($username)
    {
        return $this->Where("UserName",$username)->first();
    }
}
?>