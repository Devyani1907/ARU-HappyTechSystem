<?php namespace App\Controllers;

 use App\Models\templateDetailModel;
 use App\Models\templateFieldDetailModel;

class FeedbackController extends BaseController
{
	public function GetfeedbackTemplate()
	{
        $feedbackModel = new TemplateDetailModel();
        $data['template_name'] = $feedbackModel->display_templateName();
		return view('feedbackTemplate', $data);
	}

	public function GetfeedbackTemplateById($template_id)
	{
		// Get template fields by template id	
		$templateFieldModel = new TemplateFieldDetailModel();
		$data['template_fields']=  $templateFieldModel->get_all_templatefields_by_templateId($template_id);

		echo json_encode($data);
	}

}
