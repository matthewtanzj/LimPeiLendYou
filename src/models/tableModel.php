<?php
class tableModel {

    public function __construct()
    {
        
    }
	
	public function convertPostgresTableIntoHTML($tableName)
	{
		$query = "SELECT * FROM $tableName";
					
		$result = pg_query($query) or die ('Query Failed' . pg_last_error());;
		
		$content = "";
		
		while ($row = pg_fetch_row($result)) {
			$content = $content . "Username: $row[1] , Password: $row[2]";
			$content = $content . "<br />\n";
		}
		return $content;
	}
}