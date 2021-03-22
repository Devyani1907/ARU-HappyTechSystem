<?php namespace App\Models;
 
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = "postdetail";
    protected $allowedFields = ["PostId", "PostName","PostOpeningDateTime","PostClosingDateTime","VacancyAvail","ExperienceInYears","Education","departmentId"];

    function GetAllPost()
    {
        return $this->findAll();
    }

    function GetAllPostById($postId)
    {
        return $this->where("PostId",$postId)->findAll();
    }
}
?>