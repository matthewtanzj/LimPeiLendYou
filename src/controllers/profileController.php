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
        include('helpers/timestampParser.php');
        $timestampParser = new timestampParser();
        
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
            $content = str_replace("'", "''", $_POST['content']);
            if ($_POST['review'] == "positive") {
                $isPositive = 1;
            } else {
                $isPositive = 0;
            }
            // view will access the model directly to insert review into database
            $reviewModel = new reviewModel();
            $result = $reviewModel->addNewReview($reviewer, $reviewee, $content, $isPositive);
            // clear variables
            unset($_POST['submit-review']);
            unset($_POST['content']);
            unset($_POST['review']);
            if ($result) {
                $reviewSuccessMessage = '<p class="text-success">Review successfully added.</p>';
            } else {
                $reviewSuccessMessage = '<p class="text-danger">An error occured. Review not added.</p>';
            }
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
            $profileEmail = $data[3];
            $profileDescription = $data[4];
            $profileDisplayPictureURL = "img/display_pic/" . $data[5];
            $profileLastLoggedIn = $timestampParser->getFormattedTimestampFromTimestamp($data[7]);
            // parse both review and item results into 2 arrays
            $reviewArray = array();
            $itemArray = array();
            $counter = 0;
            $positiveReviews = 0;
            $negativeReviews = 0;
            // get all reviews of this user
            $reviewModel = new reviewModel();
            $reviewResult = $reviewModel->getAllReviewsOf($profileName);
            // create review array
            while ($row = pg_fetch_row($reviewResult)) {
                ($row[3] == 1) ? $positiveReviews++ : $negativeReviews++ ;
                $review = array($row[0], $row[2], $row[3], $timestampParser->getFormattedTimestampFromTimestamp($row[4])); // row[0]: reviewer, row[2]: review content, row[3]: positive/negative, row[4]: time of review
                array_push($reviewArray, $review);
                $counter++;
            }
            $totalReviews = $positiveReviews + $negativeReviews;
            $counter = 0;
            // load items put up by user
            $itemModel = new itemModel();
            $itemResult = $itemModel->getAllItemsOfUser($profileName);
            // create item array
            while ($row = pg_fetch_row($itemResult)) {
                $itemImageResult = $itemModel->getCoverImageOfItem($row[0], $row[1]); // get cover photo for each item
                $imageURL = pg_fetch_row($itemImageResult)[0]; // it should only have one row
                if ($imageURL == NULL) {
                    $imageURL = "img/tempLogo.jpg";
                } else {      
                    $imageURL = "img/items/" . $imageURL;
                }
                $item = array($row[0], $imageURL);
                array_push($itemArray, $item);
                $counter++;
            }
            // lastly, run the profile view
            include('views/profile.php');
        } else {
            // no result, redirect to home
            $home = new homeController();
			$home->view();
        }
	}
}