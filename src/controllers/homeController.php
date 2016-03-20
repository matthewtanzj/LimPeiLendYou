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
		$usernameErrorMessage = '';
		$passwordErrorMessage = '';
		$loginResultMessage = '';
		$signupUsernameErrorMessage = '';
		$signupPasswordErrorMessage = '';
		$signupEmailErrorMessage = '';
		$signupErrorMessage = '';

		
		if (!empty($_GET)) {
			if ($_GET['action'] == 'logout') {
				include('helpers/logout.php');
			}

			if ($_GET['action'] == 'signup') {
				include('helpers/signup.php');
			}

			if ($_GET['action'] == 'login') {
				if (!$_SESSION['loggedin'] && isset($_POST["submit"])) {
					include('helpers/login.php');
				}
			}
		}

		include('views/home.php');
	}

}

