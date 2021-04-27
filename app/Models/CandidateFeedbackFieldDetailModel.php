<?php namespace App\Models;
 
use CodeIgniter\Model;

class CandidateFeedbackFieldDetailModel extends Model
{
    protected $table = "candidatefeedbackfieldsdetails";
    protected $allowedFields = ["employeeId", "comentDetailId","candidateId","createdDate","modifiedDate",'isDeleted'];

    function GetAllCandidates()
    {
        return $this->findAll();
    }

    function saveCandidateFeedbackFieldsDetails($data){
        $this->insert($data);
    }

    function getCandidateFeedbackFieldDetailByCandidateId($candidateId)
    {
        return $this->Where("candidateId",$candidateId)->findAll();
    }
}
?>