<?php

class tableController {
	
	public function __construct() 
	{
		include("include/db_connect.php");
		include('models/tableModel.php');
	}

	/* 
	 * Function called by admin in the table view
	 * It will convert all the content in the database into formatted HTML table
	 * by calling a helper function <generateTableViewContent>
	 */
	public function convertPostgresTableIntoHTML($tableName)
	{	
		$tableModel = new tableModel();
		$result = $tableModel->retrieveEntireTable($tableName);
		$content = $this->generateTableViewContent($result);
		return $content;
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

			for ($i = 0; $i < sizeof($row); $i++) {
                $content = $content . "<td><span class='xedit' id=" . $counter . "_" .$i . ">" . $row[$i] . "</span></td>";
			}
			$content = $content . "<td><button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(this)\">Delete</button></td></tr>";
			$counter++;
		}
		return $content;
	}
}