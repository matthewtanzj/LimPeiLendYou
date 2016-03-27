<?php
class MemberModel {

    public function __construct()
    {
        
    }
	
	public function getPasswordSaltAccountType($username)
	{
		$query = "SELECT password, salt, account_type FROM member WHERE username = '$username'";
		$result = pg_query($query);
		return $result;
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

    public function emailExist($email)
    {
        $result = false;

        $query = "SELECT COUNT(*) FROM member where email = '" . $email . "'";
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
		// INSERT INTO member VALUES(DEFAULT, '123', '123', '123@hotmail.com', 'admin', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
		$salt = bin2hex(openssl_random_pseudo_bytes(120));
		$encryptedPassword = crypt($password, $salt);
		
		$query = "INSERT INTO member 
					VALUES('$username', '$encryptedPassword', '$salt', '$email', '$accountType')";
		$result = pg_query($query);
		return $result; // true if successfully inserted, false otherwise
	}

}