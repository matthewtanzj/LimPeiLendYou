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
        
		<title>WhoBorrow</title>
	</head>
	
    <body>
        <div class='wrapper'>
            <!-- login box-->
            <div id='login-box'>
                <form id='login' action='index.php' method='post' accept-charset='UTF-8'>
                    <fieldset>
                        <legend>Login</legend>
                        
                        <div class='login_help_text'>* required fields</div>
                        
                        <div class='container'>
                            <label for='username' >Username*:</label><br/>
                            <input type='text' name='username' id='username' maxlength="50"/><br/>
                            <span id='login_username_errorloc' class='error'></span>
                        </div>
                        <div class='container'>
                            <label for='password' >Password*:</label><br/>
                            <input type='password' name='password' id='password' maxlength="50" /><br/>
                            <span id='login_password_errorloc' class='error'></span>
                        </div>

                        <div class='container'>
                            <input type='submit' name='Submit' value='Submit' />
                        </div>
                        <div class='login_help_text'><a href='#'>Forgot Password?</a></div>
                    </fieldset>
                </form>
            </div>
            <!-- end of login box-->      
              
            <br>
            <div id='search-box'>
                <form action="results.php" method="post">
                    <input type="text" query="itemName"><br><br>
                    <input type="submit" value="Borrow!">
                </form>
            </div>
        </div>

        <footer>
            <p>&copy; Lim Pei Lend You</p>
        </footer>
        
        <style>
            
            #login-box {
                text-align: center;
            }
            
            #login-box fieldset {
                margin: 0 auto;
                width: 230px;
                padding:20px;
                border:1px solid #ccc;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                -khtml-border-radius: 10px;
                border-radius: 10px;  
            }
            
            #login-box .login_help_text {
                font-family : Arial, sans-serif;
                font-size: 0.6em;
                color:#333; 
            }
            
            #login-box .container {
                margin-top: 8px;
                margin-bottom: 10px;
            }
            
            #search-box {
                margin: 0 auto;
                text-align: center;
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