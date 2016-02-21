<?php


class HomeController {
	public function __construct()
	{

	}

	public function view()
	{
		$loginErrorMessage = '';
		$loginResultMessage = '';
		include('view/home.php');
	}
}

