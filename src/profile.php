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
            <!-- review panel -->
            <div class="row1">
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
            .wrapper {
                margin: 0 auto;
				width: 80%;
				padding-top: 3%;
            }
            
            .row1 {
                display: inline;
                margin: 0 auto;
                float: left;
                width: 100%;
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