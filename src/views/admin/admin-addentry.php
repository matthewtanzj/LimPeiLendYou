<?php 
	if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) ) 
	{
		include('models/memberModel.php');
		$memberModel = new memberModel();
		$result = $memberModel->addUser($_POST['username'], $_POST['password'], $_POST['email'], "member");
		if($result == true)
		{
			$result = "<p class='text-success'>Member Account Successfully Created!</p>";
		}
		else
		{
			$result = "<p class='text-danger'>Error occured during account creation!</p>";
		}
	}
?>

<div class="wrapper">
<div class="panel panel-info">
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#member" aria-controls="home" role="tab" data-toggle="tab">Add User</a></li>
            <li role="presentation"><a href="#item" aria-controls="profile" role="tab" data-toggle="tab">Add Item</a></li>
            <li role="presentation"><a href="#item_image" aria-controls="home" role="tab" data-toggle="tab">Add Item Image</a></li>
            <li role="presentation"><a href="#item_availability" aria-controls="home" role="tab" data-toggle="tab">Add Item Availability</a></li>
            <li role="presentation"><a href="#loan_request" aria-controls="home" role="tab" data-toggle="tab">Add Loan Request</a></li>
            <li role="presentation"><a href="#comment" aria-controls="home" role="tab" data-toggle="tab">Add Comment</a></li>
            <li role="presentation"><a href="#review" aria-controls="home" role="tab" data-toggle="tab">Add Review</a></li>
            <li role="presentation"><a href="#message" aria-controls="home" role="tab" data-toggle="tab">Add Message</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane fade in active" id="member">
                <div class="col-lg-12">
                    <form role="form" class="form-horizontal span8" action='admin-index.php?action=add-entry' method='POST'>
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
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="item">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </div>
    </div>    
</div>
</div>

<style>
	.wrapper {
        margin: 0 auto;
        width: 90%;
        padding-top: 5%;
	}
</style>