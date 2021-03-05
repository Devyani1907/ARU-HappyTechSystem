<?php namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		return view('Home');
	}

	public function AboutAndContactUS()
	{
		return view('aboutandcontactus');
	}

}
