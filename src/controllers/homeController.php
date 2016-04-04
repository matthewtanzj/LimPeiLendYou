<?php
class HomeController {
	public function __construct()
	{

	}

	public function view()
	{
		session_start();

		// load trending items
		include('models/itemModel.php');
        
        $itemModel = new itemModel();
        $trendingItemArray = array();
		$result = $itemModel->getTrendingItemList();
        for ($i = 0; $i < 5; $i++) {
            $row = pg_fetch_row($result);
            $item = array($row[0], $row[1], $row[2], $row[3]); // [0]: item name, [1]: owner name, [2]: price, [3]: image url
            array_push($trendingItemArray, $item);
        }       
        
        /*
		$itemModel = new itemModel();
		$result = $itemModel->getItemKeyByMostLoanrequest();
		$trendingItemIdArray = pg_fetch_all($result);

		$trendingItemArray = [];
		for ($i = 0; $i < 5; $i++) {
			$result = $itemModel->getByKey($trendingItemIdArray[$i]["owner"], $trendingItemIdArray[$i]["item_name"]);
			$trendingItemArray[] = pg_fetch_array($result);
		}
        */
		// load view
		include('views/home.php');
	}

}

