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
		$itemModel = new itemModel();
		$memberModel = new memberModel();
		$itemAvailabilityModel = new itemAvailabilityModel();

		$result = $itemModel->getByKey($owner, $itemName);
		$item = pg_fetch_array($result);

		// get all available dates
		$result = $itemAvailabilityModel->getAllByItemKey($owner, $itemName);
		$availabilityArray = pg_fetch_all($result);

		if ($availabilityArray) {
			$year  = null;
	        $month = null;
	        if(null==$year&&isset($_GET['year'])){
	            $year = $_GET['year'];
	            $month = $_GET['month'];
	        }else if(null==$year){
	            $year = date("Y",time());  
	            $month = date("m",time());
	        }

	    	$freeDates = [];
	    	foreach($availabilityArray as $availability) { 

	    		$startDate=strtotime($availability['date_start']);
	    		$endDate=strtotime($availability['date_end']);

	    		if (intval($year) == intval(date("Y",$startDate)) && intval($month) == intval(date("m",$startDate))) { 
	    			if (intval(date("m", $endDate)) != intval($month)) {
	    				$end = 31;
	    			} else {
	    				$end = intval(date("d",  $endDate));
	    			}

	    			for ($i = intval(date("d", $startDate)); $i <= $end; $i++) {
	    				$freeDates[] = $i;
	    			}
	    			
	    		}
	    	}
		}

		include('views/item.php');

	}
}