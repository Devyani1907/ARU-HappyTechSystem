<?php namespace App\Controllers;

use App\Models\candidateDetailModel;

class CandidateController extends BaseController
{
    public function getAllCandidateDetail()
	{
		$candidateDetail = new CandidateDetailModel();
		$data['candidateDetail'] = $candidateDetail->GetAllCandidates();

        echo json_encode($data);
	}
}
