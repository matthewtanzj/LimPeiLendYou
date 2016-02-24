<?php

class tableController {
	
	public function __construct() 
	{
		include("include/db_connect.php");
		include('models/tableModel.php');
	}

	public function convertPostgresTableIntoHTML($tableName)
	{	
		$tableModel = new tableModel();
		$result = $tableModel->retrieveEntireTable($tableName);
		
		while ($row = pg_fetch_row($result)) {
			$content = $content . "ID: $row[0], Username: $row[1] , Password: $row[2]";
			$content = $content . "<br />\n";
		}
		return $content;
	}
	
	public function deleteFromDatabase($tableName, $primaryKey)
	{
		include("../config/database.php");
		include("../include/db_connect.php");
		include("../models/tableModel.php");
		$tableModel = new tableModel();
		$tableModel->deleteRowFromTable($tableName, $primaryKey);
		echo "deleting id: " . $primaryKey . " from table: " . $tableName;
	}
}

if (isset($_GET['deleteKey']) && isset($_GET['table'])) {
	$tableName = $_GET['table'];
	$primaryKey = $_GET['deleteKey'];
	$tableController = new tableController();
	$tableController->deleteFromDatabase($tableName, $primaryKey);
}
