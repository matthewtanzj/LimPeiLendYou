<?php 
    var_dump($_POST);
	if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) ) {
		include('models/memberModel.php');
		$memberModel = new memberModel();
		$result = $memberModel->addUser($_POST['username'], $_POST['password'], $_POST['email'], "member");
		if($result == true) {
			$result = "<p class='text-success'>Member Account Successfully Created!</p>";
		} else {
			$result = "<p class='text-danger'>Error occured during account creation!</p>";
		}
	} else if ( isset($_POST['item_name']) && isset($_POST['owner']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['location']) && isset($_POST['description']) ) {
        include('models/itemModel.php');
		$itemModel = new itemModel();
        $result = $itemModel->addLoan($_POST['item_name'], $_POST['owner'], $_POST['category'], $_POST['price'], $_POST['description'], $_POST['location']);
        if ($result == true) {
            $result = "<p class='text-success'>Item Successfully Created!</p>";
        } else {
            $result = "<p class='text-danger'>Error occured during item creation!</p>";
        }
    } else if ( isset($_POST['item_name']) && isset($_POST['owner']) && isset($_POST['image_url']) ) {
        include('models/itemModel.php');
		$itemModel = new itemModel();
        if (isset($_POST['is_cover'])) {
            $result = $itemModel->addCoverImage($_POST['item_name'], $_POST['owner'], $_POST['image_url']);
        } else {
            $result = $itemModel->addNonCoverImage($_POST['item_name'], $_POST['owner'], $_POST['image_url']);
        }
        if ($result == true) {
            $result = "<p class='text-success'>Item Image Successfully Created!</p>";
        } else {
            $result = "<p class='text-danger'>Error occured during item image creation!</p>";
        }
    }
?>

<div class="wrapper">
<?php echo $result; ?>
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
                    </form>
                </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="item">
                <div class="col-lg-12">
                    <form role="form" class="form-horizontal span8" action='admin-index.php?action=add-entry' method='POST'>
                        <div class="control-group">
                            <label for="item_name">Item Name:</label>
                            <input type="text" name='item_name' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="item_owner">Item Owner:</label>
                            <input type="text" name='owner' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="pwd">Item Category:</label>
                            <select class="form-control" name='category'>
                                <option>Tools & Gardening</option>
                                <option>Sports & Outdoor</option>
                                <option>Parties & Events</option>
                                <option>Apparel & Accessories</option>
                                <option>Kids & Babies</option>
                                <option>Electronics</option>
                                <option>Entertainment</option>
                                <option>Home & Appliances</option>
                                <option>Arts & Crafts</option>
                                <option>Office & Education</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="control-group">
                            <label for="price">Item Price:</label>
                            <input type="number" name='price' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="description">Item Description:</label>
                            <input type="text" name='description' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="location">Location:</label>
                            <input type="text" name='location' class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="item_image">
                <div class="col-lg-12">
                    <form role="form" class="form-horizontal span8" action='admin-index.php?action=add-entry' method='POST'>
                        <div class="control-group">
                            <label for="item_name">Item Name:</label>
                            <input type="text" name='item_name' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="item_owner">Item Owner:</label>
                            <input type="text" name='owner' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="image_url">Image URL:</label>
                            <input type="text" name='image_url' class="form-control">
                        </div>
                        <div class="control-group">
                            <label for="is_cover">Image is main:</label><br>
                            <input type="checkbox" name='is_cover'>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
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
    
    .control-group {
        padding-top: 1%;
		padding-bottom: 1%;
	}
</style>