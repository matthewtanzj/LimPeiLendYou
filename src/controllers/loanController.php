<?php
class loanController {
	public function __construct()
	{
		
	}

		public function view()
	{
      	session_start();
        include('models/memberModel.php');    
        include('models/itemModel.php');
            
        $submitSuccess = false;
		$submitError = false;
            
        $username = $_SESSION['username'];    
        $itemModel = new itemModel();
                        
        if(isset($_POST["submit"])) {
            $item_name = $_POST['itemName'];
            $owner = $username;
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['item_info'];
            $location = $_POST['location'];
            $date_start = $_POST['start'];
            $date_end = $_POST['end'];
                
            
            $result = $itemModel->addLoan($item_name, $owner, $category, $price, $description, $location);
            $dateResult = $itemModel->addAvailableDates($item_name, $owner, $date_start, $date_end);
            $uploadImage = new imageController();
            $uploadImage-> uploadCoverPhoto($item_name, $owner);
                
                if (!$result) {
                    $loanCreationError = true;
                    $loanCreationErrorMessage = "<p class=\"text-danger\">Loan Creation Failed! Please contact admin.</p>";
                }
            
                if (!$dateResult) {
                   // echo " date failed";
                    $dateError = true;
                    $dateErrorMessage = "<p class=\"text-danger\">date Failed! Please contact admin.</p>";
                }
        }    



		// load view
		include('views/loan.php');
	}
}
?>