<?php namespace App\Controllers;

use App\Models\CandidateFeedbackFieldDetailModel;
use App\Models\templateDetailModel;
use App\Models\templateFieldDetailModel;
use App\Models\commentDetailModel;
use DateTime;

class TemplateController extends BaseController
{
        protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
                $this->session->start();
	}
	
        public function GetSection()
        {
                // Get the session value through session().
		$session = session();

		// Check if user is active or not logged out then directly redirect to dashboard.
		if($session->has('username'))
		{
                        $feedbackModel = new TemplateDetailModel();
                        $data['template_name'] = $feedbackModel->display_templateName();
                        return view('manageTemplate', $data);
		}
		return view('login');
               
        }

        public function GetTemplate()
        {
                  // Get the session value through session().
		$session = session();

		// Check if user is active or not logged out then directly redirect to dashboard.
		if($session->has('username'))
		{
                        $feedbackModel = new TemplateDetailModel();
                        $data['template_name'] = $feedbackModel->display_templateName();
                        return view('createdittemplate', $data);
		}
		return view('login');
               
        }

        public function GetAllTemplateData()
        {
                $feedbackModel = new TemplateDetailModel();
                $data = $feedbackModel->display_templateName();
                
                $output = array(
			"draw" => intval($_GET["draw"]),
			"recordsTotal" => count($data),
			"recordsFiltered" => count($data),
			"data" => $data	
		);
                echo json_encode($output);
        }

        public function AddTemplate($templateName)
        {
                $feedbackModel = new TemplateDetailModel();
                $feedbackModel->add_template($templateName);
        }

        public function EditTemplate()
        {
                $feedbackModel = new TemplateDetailModel();
                $feedbackModel->edit_template($_POST["templateName"],$_POST["templateId"]);
        }

        public function DeleteTemplate($templateId)
        {
                // Get section id through template id
                $templateFieldDetailModel = new TemplateFieldDetailModel();
                $sectionsIds = $templateFieldDetailModel -> get_all_templatefieldIds_by_templateId($templateId);

                if($sectionsIds)
                {
                        //Delete comments
                        $commentsDataModel = new CommentDetailModel();
                        foreach($sectionsIds as $sectionId)
                        {
                                $commentsDataModel->DeleteCommentBySectionId($sectionId);
                        }

                         //Delete sections
                        foreach($sectionsIds as $sectionId)
                        {
                                $templateFieldDetailModel -> DeleteSectionBySectionId($sectionId);
                        }
                }

                // Delete Template
                $feedbackModel = new TemplateDetailModel();
                $feedbackModel->delete_template($templateId);

        }

        public function GetSectionWithComments($templateId)
        {
                $templateFieldDetailModel = new TemplateFieldDetailModel();
                $sections = $templateFieldDetailModel -> get_all_body_sections($templateId);
                $commentsDetail = null;
                $commentsSeperatedByComma = '';
                $section_comments= null;
                $index = 0;

                foreach($sections as $section)
                {
                        // Get comments of sections
                        $commentsDataModel = new CommentDetailModel();
                        $commentsDetail = $commentsDataModel->GetAllCommentByTemplateFieldsId($section['TemplatefieldId']);
                        foreach($commentsDetail as $comment)
                        {
                                if($commentsSeperatedByComma == '')
                                {
                                        $commentsSeperatedByComma = $comment['Comment'];
                                }
                                else
                                {
                                        $commentsSeperatedByComma = $commentsSeperatedByComma .", " . $comment['Comment'];
                                }
                        }

                        $section_comments[$index] = array('sectionId' => $section['TemplatefieldId'], 'section' => $section['TemplateLabel'] , 'comments' => $commentsSeperatedByComma);
                        $index = $index + 1;
                        $commentsSeperatedByComma = null;
                }

		$output = array(
			"draw" => intval($_GET["draw"]),
			"recordsTotal" => count($section_comments),
			"recordsFiltered" => count($section_comments),
			"data" => $section_comments	
		);

		echo json_encode($output);
        }

        public function SaveSectionWithComments()
        {
                if( $_POST["action"] == "Edit")
                {
                        $sectionId = $_POST["sectionId"];
                        $this -> DeleteSectionWithComments($sectionId);
                }
                    
                $string = $_POST["section"];
                $s = ucfirst($string);
                $bar = ucwords(strtolower($s));
                $sectionLabel = preg_replace('/\s+/', '', $bar);
                $sectionId =   $sectionLabel . 'Id';      

                // save section by using template id
                $sectionData = [
                                'TemplateLabel'  => $sectionLabel,
                                'FieldType'=> 'Text',
                                'SectionType' => 'body',
                                'TemplateDetailID'=> $_POST["templateId"],
                                'TemplateLabelId' =>  $sectionId 
                ];                        

                $templateFieldDetailModel = new TemplateFieldDetailModel();
                $templateFieldsId = $templateFieldDetailModel -> save_section_by_template_id($sectionData);

                // Save comments by using section id
                $comments = $_POST["comments"];
                foreach($comments as $comment)
                {
                        $commentData = [
                                'templateFieldsDetailId'  => $templateFieldsId,
                                'Comment' =>  $comment["value"]
                        ];     

                        $commentDetailModel = new CommentDetailModel();
                        $commentDetailModel -> SaveComment($commentData);
                
                }
        }

        public function DeleteSectionWithComments($sectionId)
        {
                // Delete comments by section id
                $commentDetailModel = new CommentDetailModel();
                $commentDetailModel -> DeleteCommentBySectionId($sectionId);

                // Delete section by section id
                $templateFieldDetailModel = new TemplateFieldDetailModel();
                $templateFieldsId = $templateFieldDetailModel -> DeleteSectionBySectionId($sectionId);
        }
}
