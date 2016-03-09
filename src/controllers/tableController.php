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
		$content = $this->generateTableViewContent($result);
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
	
	private function generateTableViewContent($result)
	{
		$content = "";
		$counter = 1; // for styling odd/even row
		while ($row = pg_fetch_row($result)) {
			if ($counter % 2 == 0) 
			{ 
				$content = $content . "<tr class='odd'>";
			}
			else 
			{ 
				$content = $content . "<tr class='even'>";
			}
			/*
			$columnCounter = 0; // we can set uneditable columns using this counter
			foreach ($row as $value)
			{	
				if ($columnCounter == 0) {
					$content = $content . "<td><span>" . $value . "</span></td>";
				} else {
					$content = $content . "<td><span class='xedit'>" . $value . "</span></td>";
				}
				$columnCounter++;
			}
			*/
			for ($i = 0; $i < sizeof($row); $i++) {
				if ($i == 0) {
					$content = $content . "<td><span>" . $row[$i] . "</span></td>";
				} else {
					$content = $content . "<td><span class='xedit' id=" . $counter . "_" .$i . ">" . $row[$i] . "</span></td>";
				}
			}
			$content = $content . "<td><button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(this)\">Delete</button></td></tr>";
			$counter++;
		}
		return $content;
	}
}

if (isset($_GET['deleteKey']) && isset($_GET['table'])) {
	$tableName = $_GET['table'];
	$primaryKey = $_GET['deleteKey'];
	$tableController = new tableController();
	$tableController->deleteFromDatabase($tableName, $primaryKey);
}
