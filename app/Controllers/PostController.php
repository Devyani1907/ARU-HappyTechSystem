<?php namespace App\Controllers;

use App\Models\PostModel;
use App\Models\DepartmentModel;

class PostController extends BaseController
{
	public function GetPostAndDepartment()
	{
		$departments = new DepartmentModel();
        $data["departments"] = $departments->GetAllDepartment();

        $posts = new PostModel();
        $data["posts"] = $posts->GetAllPost();

        echo json_encode($data);
	}

}
