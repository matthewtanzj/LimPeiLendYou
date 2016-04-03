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
            
        $username = $_SESSION['username'];    
        $itemModel = new itemModel();
                        
        if(isset($_POST["submit"])) {
            $item_name = $_POST['itemName'];
            $owner = $username;
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['item_info'];
            $location = $_POST['location'];
                
            $result = $itemModel->addLoan($item_name, $owner, $category, $price, $description, $location);

                if (!$result) {
                    $loanCreationError = true;
                    $loanCreationErrorMessage = "<p class=\"text-danger\">Loan Creation Failed! Please contact admin.</p>";
                }
        }    



		// load view
		include('views/loan.php');
	}
}
?>