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
            <!-- Category box -->
            <div class="col-lg-2">
                <?php include 'views/category.php' ?>
            </div>
            <div class="col-lg-6">
                <?php include 'helpers/searchbar.php' ?>
            </div><!-- /.col-lg-6 -->
            
            <!-- Result Section -->
            <div class="result-section col-lg-10">
                <h3>Showing results for '<?php echo $search ?>'</h3>
            </div>
        </div>

    </div> <!-- /container -->

    

  </body>
</html>

<script>
    // display found items
    <?php foreach($itemArray as $item) { ?>
        $(".result-section").append("<div class='thumbnail col-lg-2'><a href='?page=item&owner=<?php echo $item['owner'] ?>&item=<?php echo $item['item_name'] ?>'><img src='...' alt=''></a><div class='caption'><span style='font-size:16px;''><?php echo $item['item_name'] ?></span><br><span style='color:grey;'><?php echo $item['price'] ?></span></div></div>");

    <?php } ?>
    
</script>



