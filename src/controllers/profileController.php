<?php
class profileController {
	public function __construct()
	{
		
	}

    // controller will initialize all data regarding profile page
	public function view()
	{
		session_start();
        include('models/memberModel.php');
        include('models/reviewModel.php');
        include('models/itemModel.php');

        // get string of user to be viewed
        if (isset($_GET['profile'])) {
            $profileStringQuery = $_GET['profile'];
        } else {
            $profileStringQuery = $_SESSION['username'];
        }
        // query database to retrieve user information
        $memberModel = new memberModel();
        $queryResult = $memberModel->getUserByUsername($profileStringQuery);
        $resultCount = pg_num_rows($queryResult);
        // check if user exists
        if ($resultCount == 1) {
            // initialize data for profile page
            $data = pg_fetch_row($queryResult);
            $profileName = $data[0];
            // get all reviews of this user
            $reviewModel = new reviewModel();
            $reviewArray = $reviewModel->getAllReviewsOf($profileName); // to be parsed into JSON in view
            // load items put up by user
            $itemModel = new itemModel();
            $itemArray = $itemModel->getAllItemsOfUser($profileName); // to be parsed into JSON in view
            var_dump(pg_fetch_row($reviewArray));
            var_dump(pg_fetch_row($itemArray));
            // lastly, run the profile view
            include('views/profile.php');
        } else {
            // no result, redirect to home
            $home = new homeController();
			$home->view();
        }
	}
}