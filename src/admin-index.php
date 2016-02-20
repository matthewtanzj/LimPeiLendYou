<?php
	session_start();
	$_SESSION['loggedin'] = false;
	
	if (isset($_POST["submit"])) {
		// Store form input as variables to be queried
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		if (!$_POST['username']) {
			$errUsername = "<p class=\"text-danger\">Please enter your username</p>";
		}
		if (!$_POST['password']) {
			$errPassword = "<p class=\"text-danger\">Please enter your password</p>";
		}
		
		// Authenticate user credentials
		if ($_POST['username'] && $_POST['password']) {
			// Connect to database
			$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=m4tthews") 
						or die('Could not connect: ' . pg_last_error());
						
			$query = "SELECT * 
						FROM test
						WHERE '$username' = name
						AND '$password' = password";
						
			$result = pg_query($query) 
						or die ('Query Failed' . pg_last_error());
						
			$num_rows = pg_num_rows($result);

			if ($num_rows == 0) {
				$loginResult = "<p class=\"text-danger\">Incorrect Username/Password</p>";
			} else {
				$loginResult = "<p class=\"text-success\">Login Succeeded! Redirecting in 3 seconds.</p>";
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				header("refresh: 3; url=http://localhost/whoborrow/src/admin-home.php" );
			}
		}
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
        
		<title>WhoBorrow - Admin</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
	</head>
	
    <body>
        <div class='wrapper'>
			<!-- image placeholder -->
			<div style="text-align: center">
				<img src="img/tempLogo.jpg">
			</div>
			<br>
            <!-- login box-->
            <div id='login-box'>
                <form id='login' action='admin-index.php' method='POST' accept-charset='UTF-8'>
                        <h3>WhoBorrow Admin</h3>
     
                        <div class='container'>
                            <label for='username' >Username*:</label><br/>
                            <input type='text' name='username' maxlength="50"/><br/>
                            <span id='login_username_errorloc' class='error'></span>
							<?php echo $errUsername;?>
                        </div>
						
                        <div class='container'>
                            <label for='password' >Password*:</label><br/>
                            <input type='password' name='password' maxlength="50" /><br/>
                            <span id='login_password_errorloc' class='error'></span>
							<?php echo $errPassword;?>
                        </div>
						
                        <div class='container'>
                            <input type="submit" name="submit" value="submit" />
                        </div>
						<?php echo $loginResult;?>
						<div class='login_help_text'>* required fields</div>
                        <div class='login_help_text'><a href='#'>Forgot Password?</a></div>
                </form>
            </div>
            <!-- end of login box-->      
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
			
            #login-box {
				margin: 0 auto;
                text-align: left;
				width: 30%;
				padding-left: 20px;
                border:1px solid #ccc;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                -khtml-border-radius: 10px;
                border-radius: 10px;  
            }
            
            #login-box .login_help_text {
                font-family : Arial, sans-serif;
                font-size: 0.8em;
                color:#333; 
            }
            
            #login-box .container {
                margin-top: 8px;
                margin-bottom: 10px;
				padding-left: 0px;	
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