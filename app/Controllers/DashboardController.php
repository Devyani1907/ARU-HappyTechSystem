<?php namespace App\Controllers;

class DashboardController extends BaseController
{
	public function get_all_candidates()
	{
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('user_view', $data);
	}

}
