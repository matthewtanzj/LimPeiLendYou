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

      <div class="container" style="width: 30%">
	      <table class="inbox-table">
	      	<tbody>
		      	<?php
			      		for ($i = 0; $i < sizeof($conversationArray); $i++) {
			      		$other = $conversationArray[$i][0];
			      		$otherIcon = $conversationArray[$i][1];
			      		$itemImage = $conversationArray[$i][2];

			      		echo'
		  	      	<tr class="media-msg">
		  						  <a href="#">
		  						  	<td>
		  						    <img class="media-object pull-left" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="img/display_pic/'.$otherIcon.'">
		  						    </td>
		  						    <td>
		  						    <img class="pull-right" alt="64x64" style="width: 32px; height:32px;" src="img/items/'.$itemImage.'">
		  						    </td>
		  						  </a>
		  		    	</tr>';
		      	}?>
	      	</tbody>
	      </table>
      </div>
		</body>
</html>