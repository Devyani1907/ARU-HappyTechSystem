<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class templateDetailModel extends Model
{
    protected $table = 'templatedetail';

    function display_templateName()
	{
        return $this->findAll();

        // public function getUsers($id = false)
        // {
        //     if($id === false) {
        //         return $this->findAll();
        //     } else {
        //         return $this->getWhere(['id' => $id]);
        //     }
        // }

        // $query=$this->db->query("select * from templatedetail");
        // //$query=$this->db->query("select * from templatedetail");
        // return $query->result();
	}

    function display_template_by_id($template_id)
    {
        return $this->where('TemplateId', $template_id)->findColumn('Name');
    }   
}