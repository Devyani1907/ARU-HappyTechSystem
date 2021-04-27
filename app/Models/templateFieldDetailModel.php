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

    function get_all_templatefieldIds_by_templateId($template_id)
    {
        return $this->where('TemplateDetailID' ,$template_id)->findcolumn("TemplatefieldId");
    }

    function get_all_body_sections($template_id)
    {
        $conditions = array('TemplateDetailID' => $template_id, 'SectionType' => 'body');
        return $this->where($conditions)->findAll();
    }

    function save_section_by_template_id($section_data)
    {
        $this->insert($section_data);
        return  $this->insertID();
    }

    function DeleteSectionBySectionId($sectionId)
    {
        $this ->where('TemplatefieldId', $sectionId)-> delete();
    }

    function GetSectionNameBySectionId($sectionId)
    {
        $this -> where('TemplatefieldId', $sectionId)-> findcolumn("TemplateLabel");
    }
}