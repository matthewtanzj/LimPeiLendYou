<?php

session_start();
$_SESSION['loggedin'] = false;

if (isset($_POST["submit"])) {
	// Store form input as variables to be queried
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!$_POST['username']) {
		$errUsername = "<p class=\"text-danger\">Please enter your username</p>";
	}
	if (!$_POST['password']) {
		$errPassword = "<p class=\"text-danger\">Please enter your password</p>";
	}
	
	// Authenticate user credentials
	if ($_POST['username'] && $_POST['password']) {
		include 'include/db_connect.php';
        
		$query = "SELECT * 
					FROM member
					WHERE username = '$username'
					AND password = '$password'";
					
		$result = pg_query($query) 
					or die ('Query Failed' . pg_last_error());
					
		$num_rows = pg_num_rows($result);
		if ($num_rows == 0) {
			$loginResult = "<p class=\"text-danger\">Incorrect Username/Password</p>";
		} else {
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			header("Location: /home");
		}
	}
}