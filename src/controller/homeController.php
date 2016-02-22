<?php


class HomeController {
	public function __construct()
	{

	}

	public function view()
	{
		session_start();

		// initialize
		if (!isset($_SESSION['loggedin'])) {
			$_SESSION['loggedin'] = false;
		}
		$loginErrorMessage = '';
		$loginResultMessage = '';

		// catch logout action
		if (!empty($_GET)) {
			if ($_GET['action'] == 'logout') {
				include('helper/logout.php');
			}
		}

		// catch login action
		if (!$_SESSION['loggedin'] && isset($_POST["submit"])) {
			include('helper/login.php');
		}

		include('view/home.php');
	}

}

