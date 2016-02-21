<?php
include("include/db_connect.php");
include("controller/homeController.php");

$home = new homeController();
$home->view();


