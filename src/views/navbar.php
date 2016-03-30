<?php
        // initialize
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['loggedin'] = false;
        }
        $usernameErrorMessage = '';
        $passwordErrorMessage = '';
        $loginResultMessage = '';
        $signupUsernameErrorMessage = '';
        $signupPasswordErrorMessage = '';
        $signupEmailErrorMessage = '';
        $signupErrorMessage = '';

        // actions for login logout & signup
        if (!empty($_GET['action'])) {
            if ($_GET['action'] == 'logout') {
                include('helpers/logout.php');
            }

            if ($_GET['action'] == 'signup') {
                include('helpers/signup.php');
            }

            if ($_GET['action'] == 'login') {
                if (!$_SESSION['loggedin'] && isset($_POST["submit"])) {
                    include('helpers/login.php');
                }
            }
        }

?>



<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">WhoBorrow?</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="">Tools &amp; Gardening</a></li>
                <li><a href="">Sports &amp; Outdoor</a></li>
                <li><a href="">Parties &amp; Events</a></li>
                <li><a href="">Apparel &amp; Accessories</a></li>
                <li><a href="">Kids &amp; Babies</a></li>
                <li><a href="">Electronics</a></li>
                <li><a href="">Entertainment</a></li>
                <li><a href="">Home &amp; Appliances</a></li>
                <li><a href="">Arts &amp; Crafts</a></li>
                <li><a href="">Office &amp; Education</a></li>
                <li><a href="">Others</a></li>
            </ul>
        </li>
      </ul>

    <?php if(!empty($_GET['page'])): ?> 
        <form class="navbar-form navbar-left" role="search" action="?page=search" method="post">
            <?php include('helpers/searchbar.php'); ?>
        </form>
    <?php endif ?>

      <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['loggedin']): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?page=profile">Profile</a></li>
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

<!-- modals -->
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
                    <label for='email' >Email*:</label><br/>
                    <input type='email' name='email' maxlength="50" /><br/>
                    <span id='login_password_errorloc' class='error'></span>
                    <?php echo $signupEmailErrorMessage;?>
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

<script>
    $('#advanceSearchModal').appendTo("body");
</script>