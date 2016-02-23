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
                                    <li><a href="admin-users.php">Users</a></li>
                                    <li><a href="admin-items.php">Items</a></li>
                                    <li><a href="admin-loans.php">Loans</a></li>
                                    <li><a href="admin-reviews.php">Reviews</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <p class="navbar-text">Logged in as <?php print $_SESSION['username']; ?></p>
                            </li>
                            <li class="dropdown">
                                <p class="navbar-text"><a href="admin-index.php?action=logout">Logout</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of nav bar -->
			
			<h2>Dynamic Pills</h2>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
    <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
			
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