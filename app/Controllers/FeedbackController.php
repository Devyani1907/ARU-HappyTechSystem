<?php namespace App\Controllers;

use App\Models\CandidateFeedbackFieldDetailModel;
use App\Models\templateDetailModel;
use App\Models\templateFieldDetailModel;
use App\Models\commentDetailModel;
use App\Models\candidateDetailModel;
use DateTime;
use PHPMailer\PHPMailer\PHPMailer;


class FeedbackController extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
        $this->session->start();
	}
	
	public function GetfeedbackTemplate()
	{
		// Get the session value through session().
		$session = session();

		// Check if user is active or not logged out then directly redirect to dashboard.
		if($session->has('username'))
		{
			$feedbackModel = new TemplateDetailModel();
			$data['template_name'] = $feedbackModel->display_templateName();
			return view('sendFeedback', $data);
		}
		return view('login');
	}

	public function GetfeedbackTemplateById($template_id)
	{
		// Get template fields by template id	
		$templateFieldModel = new TemplateFieldDetailModel();
		$data['template_fields']=  $templateFieldModel->get_all_templatefields_by_templateId($template_id);

		echo json_encode($data);
	}

	public function GetCommentsByTemplateFieldsId($templateFieldId)
	{
		// Get comments by templateFieldsId
		$commentsDataModel = new CommentDetailModel();
		$data['commentsDetail'] = $commentsDataModel->GetAllCommentByTemplateFieldsId($templateFieldId);

		echo json_encode($data);
	}

	public function saveTemplateDetails(){
		
		$candidateFeedbackFieldDetails = new CandidateFeedbackFieldDetailModel();
		$date=  new DateTime("UTC");
		$commentAry = array();
		$feedback =   $_POST['feedbackData']; 
		$feedbackTitle =   $_POST['feedbackTitle'];

		foreach ($_POST as $key => $value) {

			if (strpos($key, 'commentName') !== false) {

				$feedback = str_replace( $key ."\"" , $key . '" disabled '  , $feedback);

				array_push($commentAry,$key); 
				$data = [
					'employeeId'  => 1,
					'comentDetailId'=> $value,
					'candidateId' => $_POST['candidateId'],
					'isDeleted'=>1,
					'modifiedDate' =>  date_format($date, 'Y-m-d H:i:s')
				];
				$candidateFeedbackFieldDetails -> saveCandidateFeedbackFieldsDetails($data);
			}
		}

		foreach($commentAry as $comment)
		{
			$feedback = str_replace( $comment ."\"" , $comment . '" checked '  , $feedback);
		}

		// Update Candidate by marking that the candidate's feedback is ready
		$candidateModel = new CandidateDetailModel();
		$candidateModel->SetCandidateAsFeedbackReady($_POST['candidateId']);
		$candidateData = $candidateModel->GetCandidateById($_POST['candidateId']);

		// Add title
		$feedback = str_replace("Template", "", $feedbackTitle) ." ".$feedback;

		$this -> SendMail($feedback,$candidateData );

		$feedbackModel = new TemplateDetailModel();
        $data['template_name'] = $feedbackModel->display_templateName();
		return view('sendFeedback', $data);
		
	}
	
	public function SendMail($body,$candidateData)
	{
			$name = 'HappyTech';
			$subject = 'HappyTech Interview Feedback';
	
			require_once "PHPMailer/PHPMailer.php";
			require_once "PHPMailer/SMTP.php";
			require_once "PHPMailer/Exception.php";
	
			$mail = new PHPMailer();
	
			//SMTP Settings
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPAuth = true;
			$mail->Username = "devyani.r.pandey@gmail.com"; 
			$mail->Password = 'iamqueen19foreveryes'; 
			$mail->Port = 465;
			$mail->SMTPSecure = "ssl";
	
			//Email Settings
			$mail->isHTML(true);
			$mail->setFrom('devyani.r.pandey@gmail.com', $name);
			$mail->addAddress($candidateData["Email"]); 
			$mail->Subject = ($subject);
			$mail->Body = $body;

			// Send mail
			$mail->send();
	
	}
}
