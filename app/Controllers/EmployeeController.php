<?php namespace App\Controllers;

use App\Models\employeeDetailModel;

class EmployeeController extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
        $this->session->start();
	}

	public function login()
	{
		// Get the session value through session().
		$session = session();

		// Check if user is active or not logged out then directly redirect to dashboard.
		if($session->has('username'))
		{
			return view('dashboard');
		}
		return view('login');
	}
	
    public function CheckLoginCrendentials()
	{
		// Get the session value through session().
		$session = session();

		$employeeDetailModel = new EmployeeDetailModel();

		// Get the reviewer detail from request
		$username =  $_POST['username'];
		$password = $_POST['password'];

		// If reviewer is not logged out then redirect them to dashboard directly 
		if($session->has('username') && $_SESSION['username'] == $username )
		{
			return view('dashboard');
		}

		// For hashing password use below code
		// $hashed_password = password_hash($password, PASSWORD_DEFAULT,['cost' => 15]);
		// Here, we are using ['cost' => 15] as this is PHP version is 7.3

		// Fetch the username details
        $result = $employeeDetailModel->GetEmployeeByUsername($username);
       
        if($result != null)
        {
			// Verify password by password_verify() where password entered by user is compared by
			// hash stored in database.
            if(password_verify($password, $result["Password"])) 
            {
				// Start session
				$_SESSION['username'] = $_POST['username'];
				return view('dashboard');
            }
            else
            {
				$data["error_messg"] = "Invalid username and password";
                return view('login',$data);
            }

        }
        else
        {
			$data["error_messg"] = "Invalid username and password";
            return view('login',$data);
        }
		
	}

	public function Logout()
    {
		// Get the session value through session().
		$session = session();
		$session->remove('username');
		$session->destroy();
        return redirect()->to('/login');
    }

	public function dashboard()
	{
		// Get the session value through session().
		$session = session();

		// Check if user is active or not logged out then directly redirect to dashboard.
		if($session->has('username'))
		{
			return view('dashboard');
		}
		return view('login');
	}
}