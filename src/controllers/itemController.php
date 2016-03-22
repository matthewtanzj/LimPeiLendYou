<?php
class ItemController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();
		$id = -1;

		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
		}


		// get item info 
		include('models/itemModel.php');
		include('models/memberModel.php');
		$itemModel = new itemModel();
		$memberModel = new memberModel();

		$result = $itemModel->getById($id);
		$item = pg_fetch_array($result);


		$result = $memberModel->getNameById($item['owner_id']);
		$item['owner_name'] = pg_fetch_array($result)['username'];


		include('views/item.php');
	}
}