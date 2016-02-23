<?php
include("include/db_connect.php");
include("controllers/adminController.php");

$home = new adminController();
$home->view();