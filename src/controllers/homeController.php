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
		$result = $itemModel->getItemKeyByMostLoanrequest();
		$trendingItemIdArray = pg_fetch_all($result);


		$trendingItemArray = [];
		for ($i = 0; $i < 5; $i++) {
			$result = $itemModel->getByKey($trendingItemIdArray[$i]["owner"], $trendingItemIdArray[$i]["item_name"]);
			$trendingItemArray[] = pg_fetch_array($result);
		}

		// load view
		include('views/home.php');
	}

}

