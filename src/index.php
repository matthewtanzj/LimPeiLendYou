<?php
include("include/db_connect.php");
include("controllers/homeController.php");

$home = new homeController();
$home->view();


