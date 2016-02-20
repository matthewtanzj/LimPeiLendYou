<?php

	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		
	} else {
		header("Location: http://localhost/whoborrow/src/admin.php" );
	}
?>

<html lang="en">

<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        
		<title>Admin Home</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
	</head>
	
    <body>
        <div class='wrapper'>
			<!-- nav bar -->
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">WhoBorrow Admin</a>
					</div>
					<div class="navbar-collapse collapse navbar-right">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									Manage Tables<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="questions.php">Questions</a></li>
									<li><a href="addquestion.php">Add Question</a></li>
									<li><a href="upload.php">Upload CSV</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<p class="navbar-text">Logged in as <?php print $_SESSION['username']; ?></p>
							</li>
							<li class="dropdown">
								<p class="navbar-text"><a href="logout.php">Logout</a></p>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end of nav bar -->
			
		</div>

        <footer>
            <p>&copy; Lim Pei Lend You</p>
        </footer>
        
        <style>
            .wrapper {
				margin: 0 auto;
				width: 80%;
				padding-top: 3%;
			}
			
            footer {
                margin: 0 auto;
                width: 100%;
                overflow:hidden;
                padding: 10px 0;
                clear: both;
                text-align: center;
            }
        </style>
    </body>
	
</html>