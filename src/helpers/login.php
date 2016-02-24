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

	$result = $memberModel->getByUsernameAndPassword($username, $password);

	if (pg_num_rows($result) == 1) {
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		$row = pg_fetch_row($result);
		$_SESSION['usertype'] = $row[4]; //TODO remove magic number
	} else {
		$loginError = true;
		$loginResultMessage = "<p class=\"text-danger\">Incorrect Username/Password</p>";
	}
}
