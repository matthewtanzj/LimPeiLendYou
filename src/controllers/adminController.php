<?php


class adminController {
	
	public function __construct() 
	{
		
	}

	public function view()
	{
		session_start();
		
		// initialize
		if (!isset($_SESSION['loggedin'])) 
		{
			$_SESSION['loggedin'] = false;
		}
		$usernameErrorMessage = '';
		$passwordErrorMessage = '';
		$loginResultMessage = '';
			
		if ($this->userIsLoggedIn())
		{ 
			if (!empty($_GET)) // GET is not empty
			{
				if ($_GET['action'] == 'logout') 
				{
					session_start();
					session_destroy();				
					header("Location: admin-index.php");					
				}
			}
			else
			{
				include("views/admin/admin-home.php"); // empty GET, display home page
			}
		} 
		else 
		{
			if (isset($_POST["submit"])) 
			{
				include('helpers/login.php');
				if($this->userIsLoggedIn()) 
				{
					echo "Success. Redirecting";
					header("Location: http://localhost/whoborrow/src/admin-index.php" );// redirect if admin successfully logs in
				}
			}
			include("views/admin/admin-login.php");
		}
	}

	private function userIsLoggedIn() {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
}

