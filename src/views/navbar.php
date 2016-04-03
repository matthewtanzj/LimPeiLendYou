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
            <li><a class="btn" id="loanButton" href="index.php?page=loan">New Loan</a></li>
            <li>
        				<a href="#" id="messageInboxIcon">
        					<span class="glyphicon glyphicon-inbox"></span>
        				</a>
        		</li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?page=profile">Profile</a></li>
                    <li><a href="index.php?page=settings">Settings</a></li>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
      <!-- login box-->
        <div class='modal-body' id='login-box'>
            <form id='login' action='?action=login' method='POST' accept-charset='UTF-8'>

                <div class="form-group">    
                        <label class="control-label" for='username'>Username*</label>
                    <div>
                        <input type='text' class="form-control" name='username' placeholder="Username" maxlength="50"/>
                        <span id='login_username_errorloc' class='error'></span>
                        <?php echo $usernameErrorMessage;?>
                    </div>
                </div>
                
                <div class='form-group'>
                    <label class="control-label" for='password' >Password*</label>
                    <input type='password' class="form-control" name='password' placeholder="Password" maxlength="50" />
                    <span id='login_password_errorloc' class='error'></span>
                    <?php echo $passwordErrorMessage;?>
                </div>
            
                <div class='form-group'>
                  <h5>* Required Fields</h5>
                  <a href='#'><h5>Forgot Password?</h5></a>
                </div>
                
                  <div class='form-group'>
                    <input class="btn btn-primary form-control" type="submit" name="submit" value="Login"/>
                    <?php echo $loginResultMessage;?>
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
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign up</h4>
            </div>
        <div class='modal-body' id='login-box'>
            <form id='signup' action='?action=signup' method='POST' accept-charset='UTF-8'>

                <div class='form-group'>
                    <label class="control-label" for='username' >Username*</label><br/>
                    <input type='text' class="form-control" name='username' maxlength="50"/>
                    <span id='login_username_errorloc' class='error'></span>
                    <?php echo $signupUsernameErrorMessage;?>
                </div>
                
                <div class='form-group'>
                    <label class="control-label" for='password' >Password*</label><br/>
                    <input type='password' class="form-control" name='password' maxlength="50" />
                    <span id='login_password_errorloc' class='error'></span>
                    <?php echo $signupPasswordErrorMessage;?>
                </div>

                <div class='form-group'>
                    <label class="control-label" for='email' >Email*</label><br/>
                    <input type='email' class="form-control" name='email' maxlength="50" />
                    <span id='login_password_errorloc' class='error'></span>
                    <?php echo $signupEmailErrorMessage;?>
                </div>
                
                <div class='form-group'>
                  <h5>* required fields</h5>
                </div>
                
                <div class='form-group'>    
                    <input class="btn btn-primary form-control" type="submit" name="submit" value="Sign Up" />
                    <?php echo $signupErrorMessage;?>
                </div>
            </form>
        </div>
        <!-- end of signup box-->   
    </div>
  </div>
</div>

<script>
    $('#advancedSearchModal').appendTo("body");
</script>