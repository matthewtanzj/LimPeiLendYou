<?php
class ItemController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();
		$owner = '';
		$itemName = '';

		if (!empty($_GET['owner']) && !empty($_GET['item'])) {
			$owner = $_GET['owner'];
			$itemName = $_GET['item'];
		}

		



		// get item info 
		include('models/itemModel.php');
		include('models/memberModel.php');
		include('models/itemAvailabilityModel.php');
		include('models/commentModel.php');
		include('models/loanRequestModel.php');
		$loanRequestModel = new loanRequestModel();
		$itemModel = new itemModel();
		$memberModel = new memberModel();
		$itemAvailabilityModel = new itemAvailabilityModel();
		$commentModel = new commentModel();

		$result = $itemModel->getByKey($owner, $itemName);
		$item = pg_fetch_array($result);

		$submitSuccess = false;
		$submitError = false;
		if (!empty($_POST)) {
			if($_POST['action'] == 'requestLoan') {
				if ($_POST['start'] == '' || $_POST['end'] == '' || $_POST['bidPrice'] == '' ) {
					$submitError = true;
				} else {
					// process loan request
					$start = $_POST['start'];
					$end = $_POST['end'];
					$bidPrice = $_POST['bidPrice'];

					$request = $loanRequestModel->addLoanRequest($item['item_name'], $item['owner'], $_SESSION['username'], $start, $end, $bidPrice);

					if ($request) {
						$submitSuccess = true;
					} else {
						$submitError = true;
					}
				}
			}

			if($_POST['action'] == 'submitComment') {
				$commentModel->addComment($_POST['item_name'], $_POST['owner'], $_SESSION['username'], $_POST['content']);
			}

		}

		// get all available dates
		$result = $itemAvailabilityModel->getAllByItemKey($owner, $itemName);
		$availabilityArray = pg_fetch_all($result);

		// get all accepted pending
		$result = $loanRequestModel->getAllAcceptedByItem($itemName, $owner);
		$acceptedArray = pg_fetch_all($result);

		if ($acceptedArray) {
			$acceptedDates = [];
			foreach($acceptedArray as $accepted) { 
	    		$startDate=strtotime($accepted['date_start']);
	    		$endDate=strtotime($accepted['date_end']);

	    		$yearStart = intval(date("Y",$startDate));
	    		$monthStart = intval(date("m",$startDate));
	    		$dateStart = intval(date("d",$startDate));
	    		$yearEnd = intval(date("Y",$endDate));
	    		$monthEnd = intval(date("m",$endDate));
	    		$dateEnd = intval(date("d",$endDate));

	    		for ($y = $yearStart; $y <= $yearEnd; $y++) {
	    			for ($m = $monthStart; $m <= $monthEnd; $m++) {
	    				for ($d = $dateStart; $d <= $dateEnd; $d++) {
	    					$acceptedDates[] = $d . '-' . $m . '-' . $y;	    		
				    	}
	    			}
	    		}
	    	}
		}
		


		$freeDates = [];
		if ($availabilityArray) {
			
	    	foreach($availabilityArray as $availability) { 
	    		$startDate=strtotime($availability['date_start']);
	    		$endDate=strtotime($availability['date_end']);

	    		$yearStart = intval(date("Y",$startDate));
	    		$monthStart = intval(date("m",$startDate));
	    		$dateStart = intval(date("d",$startDate));
	    		$yearEnd = intval(date("Y",$endDate));
	    		$monthEnd = intval(date("m",$endDate));
	    		$dateEnd = intval(date("d",$endDate));

	    		for ($y = $yearStart; $y <= $yearEnd; $y++) {
	    			for ($m = $monthStart; $m <= $monthEnd; $m++) {
	    				for ($d = $dateStart; $d <= $dateEnd; $d++) {
	    					$freeDates[] = $d . '-' . $m . '-' . $y;	    		
				    	}
	    			}
	    		}
	    	}
		}

		if ($acceptedArray) {
			for ($i = 0; $i < count($freeDates); $i++) {
				for ($j = 0; $j < count($acceptedDates); $j++) {
					if (strcmp($freeDates[$i], $acceptedDates[$j]) == 0) {
						$freeDates[$i] = -1;
					}
				}
			}
		}
				

		// get all comments
		date_default_timezone_set("Asia/Singapore");
		$result = $commentModel->getCommentsByItemKey($owner, $itemName);
		$commentArray = pg_fetch_all($result);

		include('views/item.php');

	}
}