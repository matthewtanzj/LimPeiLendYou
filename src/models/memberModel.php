<?php
class MemberModel {

    public function __construct()
    {
        
    }

    public function getByUsernameAndPassword($username, $password)
    {
    	$query = "SELECT * 
            FROM member 
            WHERE username = '" . $username . "' 
            AND password = '" . $password . "'";
				
		$result = pg_query($query);

        return $result;
    }

    public function insertMember($username, $password)
    {
        $query = "INSERT INTO member (username, password) VALUES ('" . $username ."', '" . $password . "')";

        $result = pg_query($query);

        return $result;
    }

    public function memberExist($username)
    {
        $result = false;

        $query = "SELECT COUNT(*) FROM member where username = '" . $username . "'";
        $count = pg_fetch_row(pg_query($query));

        if ($count[0] > 0) {
            $result = true;
        }

        return $result;
    }
	
	public function getTotalUsers() {
		$tableName = "member";
		$query = "SELECT * FROM $tableName ORDER BY id";
		$result = pg_query($query);
		$totalUsers = pg_num_rows($result);
		return $totalUsers;
	}
	
	public function addUser($username, $password, $email, $accountType) {
		$tableName = "member";
		// INSERT INTO member VALUES(DEFAULT, '123', '123', '123@hotmail.com', 'admin', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
		$query = "INSERT INTO $tableName VALUES(DEFAULT, '$username', '$password', '$email', '$accountType', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		var_dump($query);
		$result = pg_query($query);
		return $result;
	}
}