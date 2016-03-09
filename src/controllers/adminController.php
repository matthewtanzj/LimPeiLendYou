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
			
		if ($this->userIsLoggedIn())
		{
			include("views/admin/admin-header.php"); // shows home page
			if (!empty($_GET)) // GET is not empty
			{
				if ($_GET['action'] == 'logout') // (logs out/destroy session) and redirect to login page
				{
					session_start();
					session_destroy();
					header("Location: admin-index.php");
				}
				else if ($_GET['action'] == 'member' ||
							$_GET['action'] == 'item' ||
							$_GET['action'] == 'item_image' || 
							$_GET['action'] == 'item_availability' ||
							$_GET['action'] == 'message' || 
							$_GET['action'] == 'review') // admin views content of a table
				{
					include('controllers/tableController.php');
					$tableName = $_GET['action'];
					$tableController = new tableController();
					$content = $tableController->convertPostgresTableIntoHTML($tableName);
					include('views/admin/admin-tableview.php'); // shows the view which will echo the table content and includes logic for table manipulation
				}
			}
			else // empty get, display homepage
			{
				include('views/admin/admin-home.php');
			}
		} 
		else // user is not logged in
		{
			if (isset($_POST["submit"])) // user attempts to log in
			{
				include('helpers/login.php');
				if($this->userIsLoggedIn())
				{
					if ($_SESSION['usertype'] == 'admin')
					{
						header("Location: admin-index.php" );// redirect if admin successfully logs in
					}
					else
					{
						session_start();
						session_destroy();	
						$loginResultMessage = "<p class=\"text-danger\">Only administrator accounts can be used to log in.</p>";
					}		
				}
			}
			include("views/admin/admin-login.php"); // show login page
		}
	}

	private function userIsLoggedIn() 
	{
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

