<?php namespace App\Controllers;

use App\Models\candidateDetailModel;
use App\Models\PostModel;

class CandidateController extends BaseController
{
    public function getAllCandidateDetail()
	{
		$candidateDetail = new CandidateDetailModel();
		$data['candidateDetail'] = $candidateDetail->GetAllCandidates();

        echo json_encode($data);
	}

	public function get_candidate_detail()
	{
		$candidateDetailModel = new CandidateDetailModel();
		$candidates = $candidateDetailModel->GetAllCandidates();


		$postModel = new PostModel();
		$candidateWithPostAry = array();
		$index = 0;

		foreach($candidates as $candidate)
		{
			// Get post by post Id
			$postId = $candidate["PostId"];
			$postName = $postModel -> GetAllPostById($postId);
			$index ++;
			$candidateWithPost= array('Name'=>$candidate["FirstName"] . " ". $candidate["LastName"] ,
											'PostName' => $postName ,
											'Experience' => $candidate["ExperienceInYears"],
											'Email' => 	$candidate["Email"],
											'IsFeedbackDone' => $candidate["IsFeedbackDone"]
											);
			array_push($candidateWithPostAry , 	$candidateWithPost);
		}

		$data = $candidateWithPostAry;

		$output = array(
			"draw" => intval($_GET["draw"]),
			"recordsTotal" => count($data),
			"recordsFiltered" => count($data),
			"data" =>($data)	
		);

		echo json_encode($output);
	}

	public function contactUs()
	{
		return view('contactus');
	}

	public function saveCandidate()
	{
		$candidateName = $_POST["Name"];
		$candidateEmail = $_POST["Email"];
		$mobileNum = $_POST["mobileNum"];

		$candatidateDetail = array("FirstName" => $candidateName,
									"Email" => $candidateEmail,
									"MobileNumber"=> $mobileNum,
									"ExperienceInYears"=>$_POST["exp"],
									"Education"=>$_POST["edu"]
								);

		$candidateDetailModel = new CandidateDetailModel();
		$candidateDetailModel->SaveCandidate($candatidateDetail);	
		
		return view("findjob");
	}

}

