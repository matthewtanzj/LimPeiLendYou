<?php
    session_start();
    $loggedin = false;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    }
?>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
            <?php if($loggedin): ?>
                <li><a href=""><?php print $_SESSION['username']; ?></a></li>
            <?php else: ?>
                <li><a href="" data-toggle="modal" data-target=".bs-example-modal-sm">Login</a></li>
                <li><a href="">Sign Up</a></li>
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

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- login box-->
            <div class='container' id='login-box'>
                <form id='login' action='login.php' method='POST' accept-charset='UTF-8'>
                    <div class='container'>
                        <h4><b>Login</b></h4>
                    </div>
 
                    <div class='container'>
                        <label for='username' >Username*:</label><br/>
                        <input type='text' name='username' maxlength="50"/><br/>
                        <span id='login_username_errorloc' class='error'></span>
                        <?php echo $loginErrorMessage;?>
                    </div>
                    
                    <div class='container'>
                        <label for='password' >Password*:</label><br/>
                        <input type='password' name='password' maxlength="50" /><br/>
                        <span id='login_password_errorloc' class='error'></span>
                        <?php echo $loginErrorMessage;?>
                    </div>
                    
                    <div class='container'>
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

  </body>
</html>
