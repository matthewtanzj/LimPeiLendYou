<!DOCTYPE html>
<html lang="en">

<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        
		<title>Profile</title>
		
		<!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.12.1.min.js"></script>
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
	</head>
    
    <body>
        
        <?php include 'views/navbar.php' ?>
        
        <div class="wrapper">       
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h2 style="display: block; margin-left: auto; margin-right: auto;"><?php echo $data['profileName']; ?></h2>
                    <form action="?page=settings" method="post"  enctype="multipart/form-data">
                        <div class="form-group">
                            <img style="display: block; margin-left: auto; margin-right: auto;" src="img/display_pic/<?php echo $data['display_pic']; ?>">
                            <br>
                            <h3>Change Photo</h3>
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                            <h3>Email</h3>
                            <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
                            <br>
                            <h3>User Info</h3>
                            <textarea class="form-control" rows="5" id="user_info" name="user_info" placeholder="Write something about youself!"><?php echo $data['user_info']; ?></textarea>
                            <br>
                            <button type="submit" name="submit" class="btn btn-default submit-button">Submit</button>
                        </div>
                    </form> 
                </div>
            </div>
            <!-- end of user info panel -->
        </div>
        
        <style>
            
            html, body {
                height: 100%;
            }
            
            .wrapper {
                margin: 0 auto;
				width: 70%;
                height: 100%;
            }
            
            .row2 {
                padding: 3% 2%;
            }
            
            .row3 {
                display: inline;
                margin: 0 auto;
                float: left;
                width: 100%;
                padding: 3% 0;
            }
            
            table {
                width: 100%;
            }
            
            tr, th, td {
                border-bottom: 1px solid #ddd;
            }
         
        </style>
        
    </body>
    
</html>