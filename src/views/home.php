<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Landing Page</title>

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
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WhoBorrow?</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php if($_SESSION['loggedin']): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?action=logout">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a id="loginButton" href="" data-toggle="modal" data-target=".loginModal">Login</a></li>
                 <li><a id="signupButton" href="" data-toggle="modal" data-target=".signupModal">Sign Up</a></li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="col-lg-offset-3 col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Search!</button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
    </div> <!-- /container -->

    <div class="modal fade loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- login box-->
            <div class='container' id='login-box'>
                <form id='login' action='?action=login' method='POST' accept-charset='UTF-8'>
                    <div class='container'>
                        <h4><b>Login</b></h4>
                    </div>
 
                    <div class='container'>
                        <label for='username' >Username*:</label><br/>
                        <input type='text' name='username' maxlength="50"/><br/>
                        <span id='login_username_errorloc' class='error'></span>
                        <?php echo $usernameErrorMessage;?>
                    </div>
                    
                    <div class='container'>
                        <label for='password' >Password*:</label><br/>
                        <input type='password' name='password' maxlength="50" /><br/>
                        <span id='login_password_errorloc' class='error'></span>
                        <?php echo $passwordErrorMessage;?>
                    </div>
                    
                    <div class='container'>
                        <br>
                        <input type="submit" name="submit" value="submit" />
                        <?php echo $loginResultMessage;?>
                    </div>


                    <div class='container'>
                      <h5>* required fields</h5>
                      <a href='#'><h5>Forgot Password?</h5></a>
                    </div>
                </form>
            </div>
            <!-- end of login box-->   
        </div>
      </div>
    </div>

    <div class="modal fade signupModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class='container' id='login-box'>
                <form id='signup' action='?action=signup' method='POST' accept-charset='UTF-8'>
                    <div class='container'>
                        <h4><b>Sign Up</b></h4>
                    </div>
 
                    <div class='container'>
                        <label for='username' >Username*:</label><br/>
                        <input type='text' name='username' maxlength="50"/><br/>
                        <span id='login_username_errorloc' class='error'></span>
                        <?php echo $signupUsernameErrorMessage;?>
                    </div>
                    
                    <div class='container'>
                        <label for='password' >Password*:</label><br/>
                        <input type='password' name='password' maxlength="50" /><br/>
                        <span id='login_password_errorloc' class='error'></span>
                        <?php echo $signupPasswordErrorMessage;?>
                    </div>
                    
                    <div class='container'>
                        <br>
                        <input type="submit" name="submit" value="Sign Up" />
                        <?php echo $signupErrorMessage;?>
                    </div>


                    <div class='container'>
                      <h5>* required fields</h5>
                    </div>
                </form>
            </div>
            <!-- end of signup box-->   
        </div>
      </div>
    </div>

  </body>
</html>

<script>
    // show login modal if has login error
    if (<?php echo isset($loginError) ? "true" : "false"; ?>) {
        console.log('here');
        $("#loginButton").click();
    }

    // show signup modal if has signup error
    if (<?php echo isset($signupError) ? "true" : "false"; ?>) {
        console.log('here');
        $("#signupButton").click();
    }
</script>



