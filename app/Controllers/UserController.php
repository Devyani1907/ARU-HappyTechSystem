<?php namespace App\Controllers;

class UserController extends BaseController
{
	public function login()
	{
		return view('login');
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

	public function sendFeedbackTemplate()
	{
		return view('sendfeedback');
	}

	public function contactUs()
	{
		return view('contactus');
	}

}
