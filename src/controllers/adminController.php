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
			include("views/admin/admin-home.php"); // shows home page
			if (!empty($_GET)) // GET is not empty
			{
				if ($_GET['action'] == 'logout') // (logs out/destroy session) and redirect to login page
				{
					session_start();
					session_destroy();				
					header("Location: admin-index.php");					
				}
				else if ($_GET['action'] == 'member') 
				{
					include('models/tableModel.php');
					$tableName = 'member'; // stub
					$tableModel = new tableModel();
					$content = $tableModel->convertPostgresTableIntoHTML($tableName);
					include('views/admin/admin-tableview.php'); // shows the table nav-tabs component	
				}
			}	
		} 
		else // user is not logged in
		{
			if (isset($_POST["submit"])) // user attempts to log in
			{
				include('helpers/login.php');
				if($this->userIsLoggedIn()) 
				{
					header("Location: admin-index.php" );// redirect if admin successfully logs in
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

