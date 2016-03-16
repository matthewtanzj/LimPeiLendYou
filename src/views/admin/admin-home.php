<?php
	include('models/tableModel.php');
	$tableModel = new tableModel();
?>

<div class="wrapper">
	<div class="col-md-6">
		<h1>User Statistics</h1>
			<p>Total registered users:<?php echo $tableModel->getTotalUsers()?></p>
			<p></p><?php echo $tableModel->getTotalUsers()?>
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