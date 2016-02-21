<?php
include("config/database.php");

$dbconn = pg_connect(
			"host=" . $db['hostname'] . 
			" port=" . $db['port'] . 
			" dbname=" . $db['database'] . 
			" user=" . $db['username'] . 
			" password=" . $db['password']) 
			or die('Could not connect: ' . pg_last_error());
