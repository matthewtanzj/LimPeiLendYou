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



        <!-- date picker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.min.css" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>



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
                            <h3 class="panel-title" style="font-size:200%"><?php echo  $item['item_name'] ?></h3>
                        </div>
                        <div class="panel-body">
                            <p><b>Owner:</b> <?php echo $item['owner'] ?></p>
                            <p><b>Price:</b> <?php echo $item['price'] ?></p>
                            <p><b>Location:</b> <?php echo $item['location'] ?></p>
                            <p><b>Borrow:</b></p>
                            <div class="panel panel-default" style="border: 0;box-shadow: none;">
                                <div class="panel-body">
                                    <b>Choose Dates:</b>
                                    <br>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" />
                                    </div>
                                    <div class="input-group col-lg-5 input-group-sm">
                                        <b>Bid Price:</b> <input type="text" class="form-control" value="<?php echo $item['price'] ?>">
                                    </div><!-- /input-group -->
                                    <br>
                                    <div class="input-group col-lg-5">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-5 -->
            </div>

            <a name="calendarTab" ></a>

            <div class="row">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="profile" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="description">
                            <br>
                            <div class="col-lg-12">
                                <?php echo $item['description'] ?>
                            </div>
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
    // set available dates in datepicker
    var availableDates = [<?php foreach ($freeDates as $freeDate) { ?>"<?php echo $freeDate ?>",<?php } ?>];

    function available(date) {
        dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
        if ($.inArray(dmy, availableDates) != -1) {
            return true;
        } else {
            return false;
        }
    }

     $('.input-daterange').datepicker({
      beforeShowDay:function(dt)
          { 
            return available(dt);
          }

    });

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
    
    // change green for available dates
    $('li.clickable').each(function() {
        <?php foreach ($freeDates as $date) {?>
            if (<?php echo $date ?> == this.value) {
                this.style.backgroundColor = "rgb(202, 255, 216)";
            }
        <?php } ?>
    });

  
</script>



