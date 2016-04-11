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

		$isUserSearch = false;
		$itemArray = false;
		$search = '';
		


		if (!empty($_REQUEST)) {
			
			if ($_POST['action'] == 'search' && !empty($_POST['search'])) {
				$result = $searchModel->searchByItemName($_POST['search']);
				$itemArray = pg_fetch_all($result);
			}

			if ($_REQUEST['action'] == 'searchForItem') {
				$unavailable_item = empty($_REQUEST['unavailable_item'])? '' : $_REQUEST['unavailable_item'];

				$result = $searchModel->advanceSearchForItem($_REQUEST['item'], $_REQUEST['owner'], $_REQUEST['category'], $_REQUEST['price_start'], $_REQUEST['price_end'], $_REQUEST['location'], $_REQUEST['date_start'], $_REQUEST['date_end'], $unavailable_item);
				$itemArray = pg_fetch_all($result);
			}

			if ($_POST['action'] == 'searchForUser') {
				$isUserSearch = true;
				$data = $searchModel->advanceSearchForUser($_POST['owner'], $_POST['item_number'], $_POST['pos_review'], $_POST['neg_review'], $_POST['ownerSort'], $_POST['activitySort']);
			}
		}


		include('views/search.php');

	}
}