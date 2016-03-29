<?php
class SearchController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();

		include('models/searchModel.php');
		$searchModel = new searchModel();

		$itemArray = false;
		


		if (!empty($_POST)) {
			$search = $_POST['search'];
			
			if($_POST['action'] == 'search' && !empty($search)) {
				var_dump($_POST);
				$result = $searchModel->searchByItemName($search);
				$itemArray = pg_fetch_all($result);
				var_dump($itemArray);
			}

		}


		include('views/search.php');

	}
}