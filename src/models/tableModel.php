<?php
class tableModel {

    public function __construct()
    {
    }
	
	public function retrieveEntireTable($tableName) 
	{
		$query = "SELECT * FROM $tableName ORDER BY 1";
		$result = pg_query($query);
		return $result;
	}
	
	public function deleteRowFromTable($tableName, $primaryKeyArray, $primaryKeyValueArray)
	{
        $query = "DELETE FROM $tableName WHERE ";
        $primaryKeySize = sizeof($primaryKeyArray);
        for($i=0; $i<$primaryKeySize; $i++) {
            if ($i == $primaryKeySize-1)
                $query = $query . "$primaryKeyArray[$i] = '$primaryKeyValueArray[$i]'";
            else
                $query = $query . "$primaryKeyArray[$i] = '$primaryKeyValueArray[$i]' AND ";
        }
		$result = pg_query($query);
	}
	
	public function editRowFromTable($tableName, $primaryKeyArray, $primaryKeyValueArray, $column, $value)
	{
        $query = "UPDATE $tableName SET $column = '$value' WHERE ";
        $primaryKeySize = sizeof($primaryKeyArray);
        for($i=0; $i<$primaryKeySize; $i++) {
            if ($i == $primaryKeySize-1)
                $query = $query . "$primaryKeyArray[$i] = '$primaryKeyValueArray[$i]'";
            else
                $query = $query . "$primaryKeyArray[$i] = '$primaryKeyValueArray[$i]' AND ";
        }
		$result = pg_query($query);
        if($result == false) {
            throw new Exception("lalala");
        }
	}
}