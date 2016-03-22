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
		$result = $itemModel->getItemIdByMostLoanrequest();
		$trendingItemIdArray = pg_fetch_all($result);

		$trendingItemArray = [];
		for ($i = 0; $i < 5; $i++) {
			$result = $itemModel->getById($trendingItemIdArray[$i]["item_id"]);
			$trendingItemArray[] = pg_fetch_array($result);
		}




		// load view
		include('views/home.php');
	}

}

