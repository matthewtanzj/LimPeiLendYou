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
                            <p><b>Owner:</b> <?php echo $item['owner_name'] ?></p>
                            <p><b>Price:</b> <?php echo $item['price'] ?></p>
                            <p><b>Location:</b> <?php echo $item['location'] ?></p>
                            <p><b>Description:</b></p>
                            <?php echo $item['description'] ?>
                        </div>
                    </div>
                </div><!-- /.col-lg-5 -->
            </div>

            <div class="row">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#borrow" aria-controls="home" role="tab" data-toggle="tab">Borrow</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="profile" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="borrow">
                            <br>
                            <?php
                                include 'helpers/calendar.php';
                                $calendar = new Calendar();
                                echo $calendar->show();
                            ?>
                        </div>
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
    // show login modal if has login error
    if (<?php echo isset($loginError) ? "true" : "false"; ?>) {
        console.log('here');
        $("#loginButton").click();
    }

    // show signup modal if has signup error
    if (<?php echo isset($signupError) ? "true" : "false"; ?>) {
        console.log('here');
        $("#signupButton").click();
    }

    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    

    $('li.clickable').each(function() {
        <?php foreach ($freeDates as $date) {?>
            if (<?php echo $date ?> == this.value) {
                this.style.backgroundColor = "rgb(202, 255, 216)";
            }
        <?php } ?>
    });

    $(function() {
        // make the cursor over <li> element to be a pointer instead of default
        $('li.clickable').css('cursor', 'pointer')
        // iterate through all <li> elements with CSS class = "clickable"
        // and bind onclick event to each of them
        .click(function() {
            console.log(this.value);
            // change color
            if (this.style.backgroundColor != "rgb(208, 230, 255)") {
                this.style.backgroundColor = "rgb(208, 230, 255)";
            } else {
                var inArray = false;

                <?php foreach ($freeDates as $date) {?>
                    if (<?php echo $date ?> == this.value) {
                        inArray = true;
                    }
                <?php } ?>

                if (inArray) {
                    console.log("here");
                    this.style.backgroundColor = "rgb(202, 255, 216)";
                } else {
                    this.style.backgroundColor = "";
                }                
            }
            
        });
    });
</script>



