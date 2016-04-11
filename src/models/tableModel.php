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
        var_dump($query);
		$result = pg_query($query);
        var_dump($result);
	}
	
	public function editRowFromTable($tableName, $primaryKeyArray, $primaryKeyValueArray, $column, $value)
	{
		// value edited is a password -> generate new salt and encrypt it
		if($tableName == "member" && $columnName == "password") {
			$salt = bin2hex(openssl_random_pseudo_bytes(120));
			$encryptedValue = crypt($value, $salt);
			$query = "UPDATE $tableName SET $columnName = '$encryptedValue', salt = '$salt', updated_at = CURRENT_TIMESTAMP WHERE id = '$primaryKey'";
			$result = pg_query($query);
			echo $encryptedValue;
		} 
		else 
		{
			$query = "UPDATE $tableName SET $columnName = '$value' WHERE username = '$primaryKey'";
			$result = pg_query($query);
			echo $value;
		}
	}
}