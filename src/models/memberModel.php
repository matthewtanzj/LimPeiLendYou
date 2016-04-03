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
		$query = "SELECT * FROM $tableName WHERE account_type != 'admin'";
		$result = pg_query($query);
		$totalUsers = pg_num_rows($result);
		return $totalUsers;
	}
	
	public function addUser($username, $password, $email, $accountType) {	
		// INSERT INTO member VALUES(DEFAULT, '123', '123', '123@hotmail.com', 'admin', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
		$salt = bin2hex(openssl_random_pseudo_bytes(120));
		$encryptedPassword = crypt($password, $salt);
		
		$query = "INSERT INTO member (username, password, salt, email, account_type) 
					VALUES('$username', '$encryptedPassword', '$salt', '$email', '$accountType')";
		$result = pg_query($query);
		return $result; // true if successfully inserted, false otherwise
	}
    
    public function getUserByUsername($username) {
        $query = "SELECT * FROM member WHERE username = '$username'";
        $result = pg_query($query);
        return $result;
    }

    public function updateDisplayPic($username, $displayPic) {
        $query = "UPDATE member SET display_pic='$displayPic' WHERE username='$username';";
        $result = pg_query($query);
        return $result;
    }

    public function updateEmail($username, $email) {
        $query = "UPDATE member SET email='$email' WHERE username='$username';";
        $result = pg_query($query);
        return $result;
    }

    public function updateUserInfo($username, $user_info) {
        $query = "UPDATE member SET user_info='$user_info' WHERE username='$username';";
        $result = pg_query($query);
        return $result;
    }
}