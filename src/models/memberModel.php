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
}