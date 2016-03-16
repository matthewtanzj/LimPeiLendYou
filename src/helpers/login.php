<?php
// Store form input as variables to be queried
$username = $_POST['username'];
$password = $_POST['password'];

if (!$_POST['username']) {
	$loginError = true;
	$usernameErrorMessage = "<p class=\"text-danger\">Please enter your username</p>";
}

if (!$_POST['password']) {
	$loginError = true;
	$passwordErrorMessage = "<p class=\"text-danger\">Please enter your password</p>";
}

// Authenticate user credentials
if ($_POST['username'] && $_POST['password']) {
	include('models/memberModel.php');
	$memberModel = new memberModel();
	
	//$result = $memberModel->getByUsernameAndPassword($username, $password); // will get password + salt
	$result = $memberModel->getPasswordSaltAccountType($username);
	$row = pg_fetch_row($result); // [0] contains password, [1] contains salt, [2] contains account type
	$desiredPassword = $row[0];
	$salt = $row[1];
	$accountType = $row[2];
	$userPassword = crypt($password, $salt); // hash given password with salt
	
	if ($userPassword == $desiredPassword)
	{
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['usertype'] = $accountType; //TODO remove magic number
	}
	else 
	{
		$loginError = true;
		$loginResultMessage = "<p class=\"text-danger\">Incorrect Username/Password</p>";
	}
}
