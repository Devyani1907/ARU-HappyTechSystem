<?php namespace App\Models;
 
use CodeIgniter\Model;

class CandidateDetailModel extends Model
{
    protected $table = "candidatedetail";
    protected $allowedFields = ["CandidateID", "FirstName","PostId","ExperienceInYears","CreatedDateTime","IsFeedbackDone","IsFeedbackSend","Email","MobileNumber","Education"];

    function GetAllCandidates()
    {
        return $this->findAll();
    }

    function GetCandidateById($candidateId)
    {
        return $this->Where("CandidateID",$candidateId)->first();
    }

    function SetCandidateAsFeedbackReady($candidateId,$isFeedbackDone = 0)
    {
        return $this->whereIn('CandidateID', [$candidateId])
        ->set(['IsFeedbackDone' => 1])
        ->update(); 
    }

    function GetCandidatesHavingFeedbackReady()
    {
        return $this->Where("IsFeedbackSend",0)->findAll();
    }

    function SaveCandidate($candidateDetail)
    {
        $this-> insert($candidateDetail);
    }
}
?>