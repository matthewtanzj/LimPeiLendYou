<?php
class profileController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();
        include('models/memberModel.php');

        // get profile of user to be viewed
        if (isset($_GET['profile'])) {
            $profileStringQuery = $_GET['profile'];
        } else {
            $profileStringQuery = $_SESSION['username'];
        }
        // query database to retrieve user information
        $memberModel = new memberModel();
        $queryResult = $memberModel->getUserByUsername($profileStringQuery);
        $resultCount = pg_num_rows($queryResult);
        // if no results, return to home
        if ($resultCount == 1) {
            $data = pg_fetch_row($queryResult);
            $profileName = $data[0];
            include('views/profile.php');
        } else {
            $home = new homeController();
			$home->view();
        }
        // get username from GET and query database
        // else get username from session username
        // from username, can query all items loans, etc
        // get all reviews of this user
        
		
	}
}