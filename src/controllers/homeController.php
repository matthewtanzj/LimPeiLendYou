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

		// actions for login logout & signup
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

		// load trending items
		include('models/itemModel.php');
		$itemModel = new itemModel();
		$result = $itemModel->getItemIdByMostLoanrequest();
		$trendingItemIdArray = pg_fetch_all($result);

		$trendingItemArray = [];
		for ($i = 0; $i < 5; $i++) {
			$result = $itemModel->getById($trendingItemIdArray[$i]["item_id"]);
			$trendingItemArray[] = pg_fetch_array($result);
		}




		// load view
		include('views/home.php');
	}

}

