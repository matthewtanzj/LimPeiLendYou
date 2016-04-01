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
            <div class="row">
                <div class="col-md-4">
                    <img src="img/display_picture_default.png">
                </div>
                <div class="col-md-8">
                    <h2><?php echo $profileName; ?></h2>
                    <p>Country</p>
                    <p>Country</p>
                </div>  
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p align="justify">
                        User Information: <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis tellus iaculis, lobortis dui at, iaculis metus. Nunc laoreet fringilla dolor, sit amet laoreet ante semper ut. Donec condimentum elementum metus, vitae aliquam ipsum viverra in. Quisque eu malesuada augue. Morbi ultricies nibh sed est tristique venenatis. Curabitur elementum, velit ornare hendrerit convallis, lacus erat vehicula nisl, at finibus est ipsum bibendum odio. Nulla id sem metus. Nunc risus turpis, malesuada sed nibh consectetur, posuere ornare ex. Curabitur velit ligula, vestibulum sit amet molestie ut, hendrerit non ante. Vestibulum mattis sed dolor eu luctus. Aenean tincidunt lectus ac imperdiet consectetur.
                    </p>
                </div>
            </div>
            <!-- end of user info panel -->

            <!-- start of review panel-->
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">All Reviews (<?php echo $commentArray == false ? 0 : sizeof($commentArray) ?>)</a></li>
                    <li role="presentation"><a href="#positive" aria-controls="profile" role="tab" data-toggle="tab">Positive Reviews (<?php echo $commentArray == false ? 0 : sizeof($commentArray) ?>)</a></li>
                    <li role="presentation"><a href="#negative" aria-controls="home" role="tab" data-toggle="tab">Negative Reviews (<?php echo $commentArray == false ? 0 : sizeof($commentArray) ?>)</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                        <div class="col-lg-12">
                            <br>
                            <!-- review panel -->
                            <div class="review-table">
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
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade" id="positive">
                        <div class="col-lg-12">
                            <br>
                            <p>This user has no positive reviews.</p>
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane fade" id="negative">
                        <div class="col-lg-12">
                            <br>
                            <p>This user has no negative reviews.</p>
                        </div>
                    </div>
                    
                </div>
                
                <form action="?page=item&amp;owner=<?php echo $item['owner']?>&amp;item=<?php echo $item['item_name']?>" method="post">
                    <input type="hidden" name="action" value="submitComment">
                    <input type="hidden" name="item_name" value="<?php echo $item['item_name']?>">
                    <input type="hidden" name="owner" value="<?php echo $item['owner']?>">
                    <div class="form-group">
                        <br>
                        <div id="show-comments-section"></div>
                        <br>
                        <textarea class="form-control" rows="5" id="review" name="content" placeholder="Write a review..."></textarea>
                        <br>
                        <button type="submit" class="btn btn-default submit-button">Review</button>
                    </div>
                </form> 
                
            </div>
            <!-- end of review panel-->
           
            <!-- items that are available for loan -->
            <h2>Items for Loan</h2>
            <div class="row">
                
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Hammer</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Macbook Air</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                    <img src="img/tempLogo2.png" alt="img/tempLogo.jpg">
                    <div class="caption">
                    <h3>Bicycle</h3>
                    <p><a href="#" class="btn btn-default" role="button">See More</a></p>
                    </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-3">
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