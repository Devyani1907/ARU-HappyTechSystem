<?php namespace App\Models;
 
use CodeIgniter\Model;

class CommentDetailModel extends Model
{
    protected $table = "commentdetail";
    protected $allowedFields = ["commentid", "templateFieldsDetailId","Comment","EmployeId","CandidateId","CreatedDate","ModifideDate","IsDeleted"];

    function GetAllCommentByTemplateFieldsId($templateFieldsId)
    {
        return $this->where("templateFieldsDetailId",$templateFieldsId)->findAll();
    }
    
    function GetAllCommentIdByTemplateFieldsId($templateFieldsId)
    {
        return $this->where("templateFieldsDetailId",$templateFieldsId)->findcolumn("commentid");
    }

    function GetCommentByCommentId($commentId)
    {
        return $this->where("commentid",$commentId)->findAll();
    }

    function SaveComment($commmentData)
    {
        $this -> insert($commmentData);
    }

    function DeleteCommentBySectionId($sectionId)
    {
        $this -> where('templateFieldsDetailId', $sectionId)->delete();
    }
}
?>