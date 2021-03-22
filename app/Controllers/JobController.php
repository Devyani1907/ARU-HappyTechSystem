<?php namespace App\Controllers;

use App\Models\PostModel;

class JobController extends BaseController
{
	public function findJob()
	{
		return view('findjob');
	}

	public function jobCard($postId)
	{
		$posts = new PostModel();
        $data["post"] = $posts->GetAllPostById($postId);
		return view('jobcard',$data);
	}
}
