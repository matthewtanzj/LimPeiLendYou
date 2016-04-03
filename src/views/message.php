<!-- 
  Relies heavily on the chat widget "Chat" by hardiksondagar on bootsnip.com
  The original code snippet can be found here: http://bootsnipp.com/snippets/featured/chat
-->

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
        <!-- Message scripts -->
        <script src="js/message.js"></script>
        <!-- <script src="js/message.js"></script> -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/messageStyle.css" rel="stylesheet">
        <!-- date picker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.min.css" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    </head>
    
    <body>

        <!-- Fixed navbar -->
        <?php include 'views/navbar.php' ?>
        
        <!-- Item toolbar -->

        <div class="container message-container">
            <div class="row">
                <!-- Entire Chat box -->
                <div class="message-wrap col-lg-10">

                    <!-- Sent and received messages box -->
                    <div id="msg-box" class="msg-wrap">

                        <!-- Message from receiver -->
                        <div class="media msg ">
                            <!-- Receiver Profile Icon -->
                            <a class="pull-left" href="#">
                                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="">
                            </a>
                            <!-- Message Contents -->
                            <div class="media-body">
                                <small class="pull-right time"><i class="fa fa-clock-o"></i>timestamp</small>
                                <h5 class="media-heading"><?php echo $_GET['owner']?></h5>
                                <small class="col-lg-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis consequat tempor ex, quis pulvinar ante consectetur in. Sed efficitur, eros id mollis posuere, nibh magna maximus tellus, sit amet dapibus enim est quis tellus. Curabitur ut leo ultrices, egestas eros id, mattis mauris. Vivamus viverra ut erat ut porta. Nulla vitae pellentesque odio, id feugiat odio. Proin molestie aliquet ex nec maximus. In ornare tristique sem malesuada auctor. Nullam porttitor, tortor vel dignissim finibus, felis elit finibus purus, semper tincidunt diam nibh id lacus.</small>
                            </div>
                        </div>

                        <!-- Message from sender -->
                        <div class="media msg ">
                            <a class="pull-right" href="#">
                                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="">
                            </a>
                            <div class="media-body">
                                <small class="pull-left time"><i class="fa fa-clock-o"></i>timestamp</small>
                                <h5 class="media-heading pull-right"><?php echo $_SESSION['username']?></h5>
                                <br>
                                <small class="col-lg-10 pull-right sender-message">Maecenas sed laoreet augue. Sed mattis elementum dui, quis consectetur ipsum. Aenean quis augue nec turpis rutrum lobortis quis vitae ante. Quisque at interdum nulla, hendrerit finibus purus. Quisque sit amet scelerisque sapien, nec placerat quam. Aenean mollis ante quis lectus auctor molestie. Aenean vitae dui a massa ullamcorper condimentum a et nisi. Nam ante elit, consequat ut felis ac, congue aliquet nisi.</small>
                            </div>
                        </div>

                        <!-- date separator -->
                        <!-- <div class="alert alert-info msg-date">
                            <strong>Today</strong>
                        </div> -->
                    </div>

                    <!-- Send message box -->
                    <div class="send-wrap ">

                        <textarea id="message-content" class="form-control send-message" rows="3" placeholder="Write a reply..."></textarea>

                    </div>

                    <!-- Additional buttons to include attachments -->
                    <div class="btn-panel">
                        <a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>
                        <a onclick="sendMessage('<?php echo $_SESSION['username']?>')" class=" col-lg-4 text-right btn send-message-btn pull-right"><i class="fa fa-plus"></i> Send Message</a>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>
