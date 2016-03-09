<?php
class tableModel {

    public function __construct()
    {
        
    }
	
	public function retrieveEntireTable($tableName) 
	{
		$query = "SELECT * FROM $tableName";
		$result = pg_query($query);
		return $result;
	}
	
	public function deleteRowFromTable($tableName, $primaryKey)
	{
		$query = "DELETE FROM $tableName WHERE $primaryKey = id";
		$result = pg_query($query);
	}
	
	public function editRowFromTable($tableName, $primaryKey, $columnName, $value)
	{
		$query = "UPDATE $tableName SET $columnName = '$value' WHERE id = '$primaryKey'";
		$result = pg_query($query);
	}
	
}