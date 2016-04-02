<?php
class ItemController {
	public function __construct()
	{
		
	}

	public function view()
	{
		session_start();
		$itemName = '';
		$itemOwner = '';
		$itemBorrower = '';

		if (!empty($_GET['item']) && !empty($_GET['owner']) && !empty($_GET['borrower'])) {
			$itemName = $_GET['item'];
			$itemOwner = $_GET['owner'];
			$itemBorrower = $_GET['borrower'];
		}
	}