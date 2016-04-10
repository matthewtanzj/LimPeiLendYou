<?php
include("include/db_connect.php");
include("controllers/homeController.php");
include("controllers/itemController.php");
include("controllers/searchController.php");
include("controllers/profileController.php");
include("controllers/settingsController.php");
include("controllers/uploadController.php");
include("controllers/loanController.php");
include("controllers/messageController.php");
include("controllers/imageController.php");

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

    case 'settings':
        $settings = new settingsController();
        $settings->view();
        break;

    case 'loan':
        $loan = new loanController();
        $loan->view();
        break;

    case 'message':
    		$message = new messageController();
    		$message->view();
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
