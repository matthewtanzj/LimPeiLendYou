<?php
	include('models/tableModel.php');
	include('models/memberModel.php');
	$tableModel = new tableModel();
	$memberModel = new memberModel();
?>

<div class="wrapper">
	<div class="col-md-6">
		<h1>User Statistics</h1>
		<p>Total registered users:<?php echo $memberModel->getTotalUsers()?></p>
		<?php 
			$salt = bin2hex(openssl_random_pseudo_bytes(120));
			$password = "zhengjie";
			$encryptedPassword = crypt($password, $salt);
			$query = "INSERT INTO salt VALUES('$salt')";
			$result = pg_query($query);
			var_dump($salt);
			var_dump($encryptedPassword);
		?>
	</div>
	<div class="col-md-6">
		<p>hello world</p>
	</div>
</div>

<style>
	.wrapper {
	margin: 0 auto;
	width: 90%;
	padding-top: 5%;
	}
</style>