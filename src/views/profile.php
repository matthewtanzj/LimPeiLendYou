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
                    <h3 class="panel-title"><?php echo $profileName ?></h3>
                </div>
                
                <div class="panel-body">
                    
                    <div class="row">
                        
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/display_picture_default.png" class="img-circle img-responsive"> </div>

                        <div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Department:</td>
                                        <td>Programming</td>
                                    </tr>
                                    <tr>
                                        <td>Hire date:</td>
                                        <td>06/23/2013</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>01/24/1988</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>Home Address</td>
                                        <td>Metro Manila,Philippines</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                                    </tr>
                                        <td>Phone Number</td>
                                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <p align="justify">
                                User Information: <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis tellus iaculis, lobortis dui at, iaculis metus. Nunc laoreet fringilla dolor, sit amet laoreet ante semper ut. Donec condimentum elementum metus, vitae aliquam ipsum viverra in. Quisque eu malesuada augue. Morbi ultricies nibh sed est tristique venenatis. Curabitur elementum, velit ornare hendrerit convallis, lacus erat vehicula nisl, at finibus est ipsum bibendum odio. Nulla id sem metus. Nunc risus turpis, malesuada sed nibh consectetur, posuere ornare ex. Curabitur velit ligula, vestibulum sit amet molestie ut, hendrerit non ante. Vestibulum mattis sed dolor eu luctus. Aenean tincidunt lectus ac imperdiet consectetur.
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
                                            echo '<td><div id="timestamp">10 feb 2016</div></td>';
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
                                            echo '<td><div id="timestamp">10 feb 2016</div></td>';
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
                                            echo '<td><div id="timestamp">10 feb 2016</div></td>';
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
        
        <style>
            
            html, body {
                height: 100%;
            }
            
            .wrapper {
                margin: 0 auto;
				width: 70%;
                height: 100%;
            }
            
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