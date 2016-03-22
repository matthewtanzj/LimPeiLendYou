<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>WhoBorrow?</title>

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
        <!-- Fixed navbar -->
        <?php include 'views/navbar.php' ?>

        <div class="container">    
            <div class="row">
                <!-- pictures area -->
                <div class="col-lg-7">
                        <a href="#" class="thumbnail">
                            <img src="..." alt="...">
                        </a>
                </div>
                <!-- info area -->
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size:200%"><?php echo  $item['name'] ?></h3>
                        </div>
                        <div class="panel-body">
                            <p>Owner: <?php echo $item['owner_name'] ?></p>
                            <p>Price: <?php echo $item['price'] ?></p>
                            <p>Location: <?php echo $item['location'] ?></p>
                            <p>Available Dates: below insert calendar</p>
                        </div>
                    </div>
                </div><!-- /.col-lg-5 -->
            </div>

            <div class="row">
                <!-- Trending Section -->
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="profile" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="description"><?php echo $item['description'] ?></div>
                        <div role="tabpanel" class="tab-pane fade" id="comments">
                            <div class="form-group">
                                <br>
                                <textarea class="form-control" rows="5" id="comment" placeholder="Write a public comment..."></textarea>
                                <br>
                                <button type="submit" class="btn btn-default">Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>

<script>
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    
</script>



