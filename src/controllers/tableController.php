<?php

class tableController {
	
	public function __construct() 
	{
		
	}

	public function convertPostgresTableIntoHTML($tableName)
	{
		include('models/tableModel.php');
		$tableModel = new tableModel();
		$result = $tableModel->retrieveEntireTable($tableName);
		
		while ($row = pg_fetch_row($result)) {
			$content = $content . "Username: $row[1] , Password: $row[2]";
			$content = $content . "<br />\n";
		}
		return $content;
	}
}

