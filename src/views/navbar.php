
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