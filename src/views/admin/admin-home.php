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