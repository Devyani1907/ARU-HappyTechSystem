<?php namespace App\Controllers;

use App\Models\EmployeeDetailModel;

class UserController extends BaseController
{
	public function login()
	{
		$data["errorMessage"]="";
		return view('login', $data);
	}

	public function forgotPassword()
	{
		return view('forgot-password');
	}

	public function registration()
	{
		return view('registration');
	}

	public function dashboard()
	{
		return view('dashboard');
	}

	// public function get_candidate_detail()
	// {
	// 	$this->load -> model("candidateDetailModel");
	// 	$fetch_data = $this -> candidateDetailModel-> make_datatable();
	// 	$data = array();
	// 	foreach($fetch_data as $row)
	// 	{
	// 		$sub_array = array();
	// 		$sub_array[] = $row->FirstName;
	// 		$sub_array[] = $row->FirstName;
	// 		$sub_array[] = $row->FirstName;
	// 		$sub_array[] = $row->FirstName;
	// 		$sub_array[] = $row->FirstName;
	// 		$data[] = $sub_array;

	// 	}

	// 	$output = array(
	// 		"draw" => intval($_POST["draw"]),
	// 		"recordsTotal" => $this-> candidateDetailModel -> get_all_data(),
	// 		"recordsFiltered" => $this-> candidateDetailModel -> get_filtered_data(),
	// 		"data" => $data	
	// 	);

	// 	echo json_encode($output);
	// }

	
	
	public function contactUs()
	{
		return view('contactus');
	}

}
