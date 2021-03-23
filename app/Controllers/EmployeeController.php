<?php namespace App\Controllers;

use App\Models\EmployeeDetailModel;

class EmployeeController extends BaseController
{
    public function CheckLoginCrendentials()
	{
		//$session = session();
		$username = $this->request->getVar('username');
		$password =  $this->request->getVar('password');

		$employeeObj =  new EmployeeDetailModel();
		$empDetail = $employeeObj->GetEmployeeByUsername($username); 

		$data["errorMessage"]="pass";
		if($empDetail)
		{
			$data["errorMessage"]="fail";
            $session->setFlashdata('msg', 'Email not Found');
			return view('login', $data);
		}
		else
		{
			if($empDetai["Password"] == $password)
			{
				$ses_data = [
                    'user_id'       => $empDetail['EmployeeId'],
                    'user_name'     => $empDetail['EmployeeName'],
                    'user_email'    => $empDetail['UserName'],
                    'logged_in'     => TRUE
				];
                $session->set($ses_data);
				return view('dashboard');
			}
			else
			{
                $session->setFlashdata('msg', 'Wrong Password');
				return view('login', $data);
			}
			
            return view('login', $data);
		}
		
        //$data["errorMessage"]="fail";
		//return view('login', $data);
	}

	public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}