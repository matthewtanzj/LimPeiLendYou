<?php
include("include/db_connect.php");
include("controllers/homeController.php");
include("controllers/itemController.php");


if (!empty($_GET['page'])) {
	switch ($_GET['page']) {
		case 'item':
			$item = new itemController();
			$item->view();
			break;
		
		default:
			$home = new homeController();
			$home->view();
			break;
	}
} else {
	$home = new homeController();
	$home->view();
}