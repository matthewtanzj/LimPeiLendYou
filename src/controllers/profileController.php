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
        if (isset($_GET['profile']) && $_GET['profile'] != $_SESSION['username']) {
            $profileStringQuery = $_GET['profile'];
        } else {
            $profileStringQuery = $_SESSION['username'];
            $isViewingOwnProfile = true;
        }
        
        /* this part deals with the user attempting to submit a review */
        if (isset($_POST['submit-review'])) {
            // parse POST data
            $reviewer = $_SESSION['username'];
            $reviewee = $_GET['profile'];
            $content = $_POST['content'];
            if ($_POST['review'] == "positive") {
                $isPositive = 1;
            } else {
                $isPositive = 0;
            }
            // view will access the model directly to insert review into database
            $reviewModel = new reviewModel();
            $reviewModel->addNewReview($reviewer, $reviewee, $content, $isPositive);
            // clear variables
            unset($_POST['submit-review']);
            unset($_POST['content']);
            unset($_POST['review']);
            $reviewSuccessMessage = '<p class="text-success">Review successfully added.</p>';
        }       
        
        /* this part onwards deals with the rendering of the profile page */
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
            $reviewResult = $reviewModel->getAllReviewsOf($profileName); // to be parsed into JSON in view
            // load items put up by user
            $itemModel = new itemModel();
            $itemResult = $itemModel->getAllItemsOfUser($profileName); // to be parsed into JSON in view
            // parse both review and item results into 2 arrays
            $reviewArray = array();
            $itemArray = array();
            $counter = 0;
            $positiveReviews = 0;
            $negativeReviews = 0;
            while ($row = pg_fetch_row($reviewResult)) {
                ($row[3] == 1) ? $positiveReviews++ : $negativeReviews++ ;
                $review = array($row[0], $row[2], $row[3]); // row[0]: reviewer, row[2]: review content, row[3]: positive/negative
                array_push($reviewArray, $review);
                $counter++;
            }
            $totalReviews = $positiveReviews + $negativeReviews;
            $counter = 0;
            while ($row = pg_fetch_row($itemResult)) {
                $item = array($row[0]);
                array_push($itemArray, $item);
                $counter++;
            }
            //var_dump($reviewArray);
            //var_dump($itemArray);
            // lastly, run the profile view
            include('views/profile.php');
        } else {
            // no result, redirect to home
            $home = new homeController();
			$home->view();
        }
	}
}