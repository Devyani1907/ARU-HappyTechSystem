<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class TemplateFieldDetailModel extends Model
{
    protected $table = 'templatefieldsdetail';
    protected $allowedFields = ['TemplatefieldId','TemplateLabel','FieldType','SectionType','TemplateDetailID','TemplateLabelId'];

    function get_all_templatefields_by_templateId($template_id)
    {
        return $this->where('TemplateDetailID' ,$template_id)->findAll();
    }
}