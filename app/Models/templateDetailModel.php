<?php namespace App\Models;
 
use CodeIgniter\Model;
use DateTime;

class templateDetailModel extends Model
{
    protected $table = 'templatedetail';
    protected $allowedFields = ["TemplateId", "Name","IsDeleted","CreatedDateTime","ModifiedDateTime"];

    function display_templateName()
	{
        return $this->findAll();
	}

    function display_template_by_id($template_id)
    {
        return $this->where('TemplateId', $template_id)->findColumn('Name');
    }   

    function add_template($template_name)
    {
        $date=  new DateTime("UTC");
        $templateDetail = array("Name" => $template_name, "CreatedDateTime" => date_format($date, 'Y-m-d H:i:s'));
        $this-> insert($templateDetail);
    }

    function edit_template($template_name, $template_id)
    {
        $date=  new DateTime("UTC");
        $this->whereIn('TemplateId', [$template_id])
                ->set(['Name' => $template_name, "ModifiedDateTime" => date_format($date, 'Y-m-d H:i:s')])
                ->update();
    }

    function delete_template($template_id)
    {
        $this-> where("TemplateId",$template_id)->delete();
    }
}