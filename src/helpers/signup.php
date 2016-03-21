<?php
include('models/memberModel.php');
$memberModel = new memberModel();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (!$_POST['username']) {
	$signupError = true;
	$signupUsernameErrorMessage = "<p class=\"text-danger\">Please enter an username</p>";
}

if (!$_POST['password']) {
	$signupError = true;
	$signupPasswordErrorMessage = "<p class=\"text-danger\">Please enter a password</p>";
}

if (!$_POST['email']) {
	$signupError = true;
	$signupEmailErrorMessage = "<p class=\"text-danger\">Please enter an email</p>";
}

if ($_POST['username'] && $_POST['password'] && $_POST['email']) {
	if ($memberModel->memberExist($username)) { // check if have existing username
		$signupError = true;
		$signupErrorMessage = "<p class=\"text-danger\">Existing username!</p>";
	} else if ($memberModel->emailExist($email)){
		$signupError = true;
		$signupErrorMessage = "<p class=\"text-danger\">Existing email!</p>";
	} else {
		// insert member
		$result = $memberModel->addUser($username, $password, $email, 'member');

		if (!$result) {
			$signupError = true;
			$signupErrorMessage = "<p class=\"text-danger\">Sign up fail! Please contact admin.</p>";
		}
	}
}