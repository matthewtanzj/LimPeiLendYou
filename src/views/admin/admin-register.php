<?php 
	if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) ) 
	{
		include('models/memberModel.php');
		$memberModel = new memberModel();
		$result = $memberModel->addUser($_POST['username'], $_POST['password'], $_POST['email'], "admin");
		if($result == true)
		{
			$result = "<p class='text-success'>Admin Account Successfully Created!</p>";
		}
		else
		{
			$result = "<p class='text-danger'>Error occured during account creation!</p>";
		}
	}
?>
<div class="wrapper">
	<form role="form" class="form-horizontal span8" action='admin-index.php?action=add-admin' method='POST'>
		<div class="control-group">
			<label for="username">Username:</label>
			<input type="username" name='username' class="form-control" id="user">
		</div>
		<div class="control-group">
			<label for="pwd">Password:</label>
			<input type="password" name='password' class="form-control" id="pwd">
		</div>
		<div class="control-group">
			<label for="email">Email:</label>
			<input type="email" name='email' class="form-control" id="email">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
		<?php echo $result; ?>
	</form>
	
</div>

<style>
	.wrapper {
		margin: 0 auto;
		width: 90%;
		padding-top: 5%;
	}
	
	.control-group {
		padding-bottom: 1%;
	}
</style>
