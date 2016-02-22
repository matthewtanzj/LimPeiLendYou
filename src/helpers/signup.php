<?php
include('models/memberModel.php');
$memberModel = new memberModel();

$username = $_POST['username'];
$password = $_POST['password'];

if (!$_POST['username']) {
	$signupError = true;
	$signupUsernameErrorMessage = "<p class=\"text-danger\">Please enter an username</p>";
}

if (!$_POST['password']) {
	$signupError = true;
	$signupPasswordErrorMessage = "<p class=\"text-danger\">Please enter a password</p>";
}

if ($_POST['username'] && $_POST['password']) {
	if ($memberModel->memberExist($username)) { // check if have existing username
		$signupError = true;
		$signupErrorMessage = "<p class=\"text-danger\">Existing username!</p>";
	} else {
		// insert member
		$result = $memberModel->insertMember($username, $password);

		if (!$result) {
			$signupError = true;
			$signupErrorMessage = "<p class=\"text-danger\">Sign up fail! Please contact admin.</p>";
		}
	}
}