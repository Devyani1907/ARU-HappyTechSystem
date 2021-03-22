<?php namespace App\Models;
 
use CodeIgniter\Model;

class CandidateDetailModel extends Model
{
    protected $table = "candidatedetail";
    protected $allowedFields = ["CandidateID", "FirstName","PostId","ExperienceInYears","CreatedDateTime"];

    function GetAllCandidates()
    {
        return $this->findAll();
    }
}
?>