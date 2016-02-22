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
}