<?php
class settingsController {
	public function __construct()
	{
		
	}

    // controller will initialize all data regarding profile page
	public function view()
	{
		session_start();
        include('models/memberModel.php');

        $username = $_SESSION['username'];
        $memberModel = new memberModel();

        // check for form submission
        if(isset($_POST["submit"])) {
            $uploadManager = new uploadController();
            $uploadManager->uploadDisplayPic($username);
            if (isset($_POST["email"])) {
                $memberModel->updateEmail($username, $_POST["email"]);
            }

            if (isset($_POST["user_info"])) {
                $memberModel->updateUserInfo($username, $_POST["user_info"]);
            }
        }

        // query database to retrieve user information
        $memberModel = new memberModel();
        $queryResult = $memberModel->getUserByUsername($username);
        $resultCount = pg_num_rows($queryResult);
        // check if user exists
        if ($resultCount == 1) {
            // initialize data for profile page
            $queryData = pg_fetch_row($queryResult);
            $data['profileName'] = $queryData[0];
            $data['email'] = $queryData[3];
            $data['user_info'] = $queryData[4];
            $data['display_pic'] = $queryData[5];
            // lastly, run the profile view
            include('views/settings.php');
        } else {
            // no result, redirect to home
            $home = new homeController();
			$home->view();
        }
	}
}