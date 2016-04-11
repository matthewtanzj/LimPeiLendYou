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
        <?php
        	echo '<div class="row"><div class="item-toolbar"><a class="media col-lg-3" href="#"><img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width:64px; height:64px;" src="img/items/'.$itemImage.'"></a> <span class="col-lg-3 item-toolbar-price">Loan Price: $'.$itemPrice.'</span><span class="col-lg-3 item-toolbar-price">Bid Price: $'.$itemPrice.'</span></div></div>';
        ?>

        <!-- Message container -->
        <div class="container message-container">
            <div class="row">
                <!-- Entire Chat box -->
                <div class="message-wrap col-lg-10">

                    <!-- Sent and received messages box -->
                    <div id="msg-box" class="msg-wrap">

                        <!-- Insert chat history -->
                        <?php

                          include('helpers/timestampParser.php');
                          $timestampParser = new timestampParser();

                          for ($i = 0; $i < sizeof($messageArray); $i++) {

                            $msgSender = $messageArray[$i][0];
                            $msgSenderIcon = $messageArray[$i][1];
                            $msgContent = $messageArray[$i][2];
                            $msgTimestamp = $messageArray[$i][3];
                            $formattedTimestamp = $timestampParser->getFormattedTimestampForMessage($msgTimestamp);

                            echo '<div class="media msg "><a class="pull-left" href="#"><img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="img/display_pic/'.$msgSenderIcon.'"></a><div class="media-body"><small class="pull-right time"><i class="fa fa-clock-o"></i>'.$formattedTimestamp.'</small><h5 class="media-heading">'. $msgSender.'</h5><small class="col-lg-10">'.$msgContent.'</small></div></div>';
                          }
                        ?>

                        <!-- Scroll to latest message -->
                        <script>updateScroll();</script>

                        <!-- date separator -->
                        <!-- <div class="alert alert-info msg-date">
                            <strong>Today</strong>
                        </div> -->
                    </div>

                    <!-- Send message box -->
                    <div class="send-wrap ">

                        <textarea id="message-content" class="form-control send-message" rows="3" placeholder="Write a reply..."></textarea>

                        <!-- Focus on text area -->
                        <script>$('#message-content').focus();</script>
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
