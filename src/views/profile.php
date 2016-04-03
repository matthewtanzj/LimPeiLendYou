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
        
        <?php include 'views/navbar.php' ?>
        
        <div class="wrapper">
            
            <!-- user info panel -->
            <div class="panel panel-info">
                
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $profileName ?>'s Profile</h3>
                </div>
                
                <div class="panel-body">
                    
                    <div class="row">
                        
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/display_picture_default.png" class="img-circle img-responsive"> </div>

                        <div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $profileName ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last Online</td>
                                        <td><?php echo $profileLastLoggedIn ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:info@support.com"><?php echo $profileEmail ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>User Rating</td>
                                        <td><span class="stars"><?php echo $positiveReviews/$totalReviews*5 ?></span>(<?php echo $totalReviews?> reviews)</td>
                                    </tr>
                                    
                                        <td>Phone Number</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <p align="justify">
                                <?php echo $profileDescription ?>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end of user info panel -->

            <!-- start of review panel-->
            <div class="panel panel-info">
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">All Reviews (<?php echo $totalReviews ?>)</a></li>
                    <li role="presentation"><a href="#positive" aria-controls="profile" role="tab" data-toggle="tab">Positive Reviews (<?php echo $positiveReviews ?>)</a></li>
                    <li role="presentation"><a href="#negative" aria-controls="home" role="tab" data-toggle="tab">Negative Reviews (<?php echo $negativeReviews ?>)</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                        <div class="col-lg-12">
                            <br>
                            <!-- review table -->
                            <div class="review-table">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="col-md-6">Review</th>
                                        <th class="col-md-2">Reviewer</th>
                                        <th class="col-md-2">Date</th>
                                    </thead>
                                    <?php
                                        for($i = 0; $i < sizeof($reviewArray); $i++) {
                                            echo ($reviewArray[$i][2] == 1)  ? '<tr class="success">' : '<tr class="danger">';
                                            echo '<td><div id="review-content">'. $reviewArray[$i][1] .'</div></td>';
                                            echo '<td><div id="username">'. $reviewArray[$i][0] .'</div></td>';
                                            echo '<td><div id="timestamp">'. $reviewArray[$i][3] .'</div></td>';
                                            echo '<tr>';
                                        }
                                    ?>
                                </table>
                            </div> 
                            <!-- end of review table-->
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade" id="positive">
                        <div class="col-lg-12">
                            <br>
                            <!-- review table -->
                            <div class="review-table">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="col-md-6">Review</th>
                                        <th class="col-md-2">Reviewer</th>
                                        <th class="col-md-2">Date</th>
                                    </thead>
                                    <?php
                                        for($i = 0; $i < sizeof($reviewArray); $i++) {
                                            if ($reviewArray[$i][2] == 0) continue;
                                            echo '<tr class="success">';
                                            echo '<td><div id="review-content">'. $reviewArray[$i][1] .'</div></td>';
                                            echo '<td><div id="username">'. $reviewArray[$i][0] .'</div></td>';
                                            echo '<td><div id="timestamp">'. $reviewArray[$i][3] .'</div></td>';
                                            echo '<tr>';
                                        }
                                    ?>
                                </table>
                            </div> 
                            <!-- end of review table-->
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade" id="negative">
                        <div class="col-lg-12">
                            <br>
                            <!-- review table -->
                            <div class="review-table">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="col-md-6">Review</th>
                                        <th class="col-md-2">Reviewer</th>
                                        <th class="col-md-2">Date</th>
                                    </thead>
                                    <?php
                                        for($i = 0; $i < sizeof($reviewArray); $i++) {
                                            if ($reviewArray[$i][2] == 1) continue;
                                            echo '<tr class="danger">';
                                            echo '<td><div id="review-content">'. $reviewArray[$i][1] .'</div></td>';
                                            echo '<td><div id="username">'. $reviewArray[$i][0] .'</div></td>';
                                            echo '<td><div id="timestamp">'. $reviewArray[$i][3] .'</div></td>';
                                            echo '<tr>';
                                        }
                                    ?>
                                </table>
                            </div> 
                            <!-- end of review table-->
                        </div>
                    </div>
                    
                </div>
                <?php if (!$isViewingOwnProfile): ?>
                <form action="#" method="post">
                    <input type="hidden" name="action" value="submitComment">
                    <input type="hidden" name="item_name" value="<?php echo $item['item_name']?>">
                    <input type="hidden" name="owner" value="<?php echo $item['owner']?>">
                    <div class="form-group">
                        <br>
                        <div id="show-comments-section"></div>
                        <br>
                        <textarea class="form-control" rows="5" id="review" name="content" placeholder="Write a review..."></textarea>
                        <br>
                            <input type="radio" name="review" value="positive"/> Positive<br>
                            <input type="radio" name="review" value="negative"/> Negative<br><br>
                        <button type="submit-review" name="submit-review" value="submit-review" class="btn btn-default submit-button">Review</button>
                        <?php echo $reviewSuccessMessage; ?>
                    </div>
                </form>
                <?php endif ?>
            </div>    
            </div>    
            <!-- end of review panel-->
           
            <!-- items that are available for loan -->
            <h2>Items for Loan</h2>
            <div class="row">
                
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Hammer</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Macbook Air</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Bicycle</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Fan</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
            </div>
            <!-- end of items that are available for loan --> 
        </div>
        
        <script>
            
            $(function() {
                $('span.stars').stars();
            });
            
            $.fn.stars = function() {
                return $(this).each(function() {
                    // Get the value
                    var val = parseFloat($(this).html());
                    // Make sure that the value is in 0 - 5 range, multiply to get width
                    var size = Math.max(0, (Math.min(5, val))) * 16;
                    // Create stars holder
                    var $span = $('<span />').width(size);
                    // Replace the numerical value with stars
                    $(this).html($span);
                });
            }
        </script>
        
        <style>
            
            html, body {
                height: 100%;
            }
            
            .wrapper {
                margin: 0 auto;
				width: 70%;
                height: 100%;
            }
            
            #review-content {
                align: "justify";
            }
            
            table {
                width: 100%;
            }
            
            tr, th, td {
                border-bottom: 1px solid #A9A9A9;
            }
            
            span.stars, span.stars span {
                display: block;
                background: url("img/stars.png") 0 -16px repeat-x;
                width: 80px;
                height: 16px;
            }

            span.stars span {
                background-position: 0 0;
            }
            
        </style>
        
    </body>
    
</html>