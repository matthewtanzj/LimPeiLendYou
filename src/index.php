<?php
include("include/db_connect.php");
include("controllers/homeController.php");
include("controllers/itemController.php");
include("controllers/searchController.php");
include("controllers/profileController.php");

if (!empty($_GET['page'])) {
	switch ($_GET['page']) {
		case 'item':
			$item = new itemController();
			$item->view();
			break;

		case 'search':
			$search = new searchController();
			$search->view();
			break;

        case 'profile':
            $profile = new profileController();
            $profile->view();
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