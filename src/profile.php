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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</head>
    
    <body>
        <div class="wrapper">
            <!-- user info panel -->
            <div class="row1">
                <div class="col-md-4">
                    <img src="img/tempLogo.jpg">
                </div>
                <div class="col-md-8">
                    <h2>Username</h2>
                    <p>Country</p>
                    <p>Country</p>
                </div>
                <div class="col-md-12">
                    <p align="justify">
                        User Information: <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis tellus iaculis, lobortis dui at, iaculis metus. Nunc laoreet fringilla dolor, sit amet laoreet ante semper ut. Donec condimentum elementum metus, vitae aliquam ipsum viverra in. Quisque eu malesuada augue. Morbi ultricies nibh sed est tristique venenatis. Curabitur elementum, velit ornare hendrerit convallis, lacus erat vehicula nisl, at finibus est ipsum bibendum odio. Nulla id sem metus. Nunc risus turpis, malesuada sed nibh consectetur, posuere ornare ex. Curabitur velit ligula, vestibulum sit amet molestie ut, hendrerit non ante. Vestibulum mattis sed dolor eu luctus. Aenean tincidunt lectus ac imperdiet consectetur.
                    </p>
                </div>
            </div>
            <!-- end of user info panel -->
            
            <!-- items that are available for loan -->
            <p>Items available for loan:</p>
            <ul class="media-list row2">
                <li class="media">
                    <div class="media-left">
                        <a href="#">
                        <img class="media-object" src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Item 1</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis tellus iaculis, lobortis dui at, iaculis metus.</p>
                    </div>
                </li>
                <li class="media">
                    <div class="media-left">
                        <a href="#">
                        <img class="media-object" src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Item 2</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis tellus iaculis, lobortis dui at, iaculis metus.</p>
                    </div>
                </li>
            </ul>
            <!-- end of items that are available for loan -->
            <!-- review panel -->
            <div class="row3">
                <b><u>Reviews given by other borrowers:</u></b><br>
                <span class="glyphicon glyphicon-thumbs-up"></span><p style="display:inline">:10</p>
                <span class="glyphicon glyphicon-thumbs-down"></span><p style="display:inline">:10</p><br><br>
                <table class="table table-hover">
                    <thead>
                        <th class="col-md-2">Verdict</th>
                        <th class="col-md-6">Review</th>
                        <th class="col-md-2">Reviewer</th>
                        <th class="col-md-2">Date</th>
                    </thead>
                    <tr>
                        <td><span class="glyphicon glyphicon-thumbs-up"></span></td>
                        <td><div id="review-content">Very Good. I like it.</div></td>
                        <td><div id="username">Matthew Tan</div></td>
                        <td><div id="timestamp">10 feb 2016</div></td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-thumbs-down"></span></td>
                        <td><div id="review-content">Boo! </div></td>
                        <td><div id="username">Matthew Tan</div></td>
                        <td><div id="timestamp">8 feb 2016</div></td>
                    </tr>
                </table>
            </div>
            <!-- end of review panel -->
        </div>
        
        <style>
            
            html, body {
                height: 100%;
            }
            
            .wrapper {
                margin: 0 auto;
				width: 60%;
                height: 100%;
            }
            
            .row1 {
                display: inline-block;
                width: 100%;
                padding: 3% 0;
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