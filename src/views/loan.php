<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>loanpage</title>

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
     
        <form class="col-md-6 col-md-offset-3" action='?page=loan' method='POST' >
          <div class="form-group">
            <label for="categorySelection">Category</label>
              <select class="form-control" name="category">
                  <option value="Null">Choose one</option>
                  <option value="tools">Tools &amp; Gardening</option>
                  <option value="sports">Sports &amp; Outdoor</option>
                  <option value="parties">Parties &amp; Events</option>
                  <option value="apparel">Apparel &amp; Accessories</option>
                  <option value="kids">Kids &amp; Babies</option>
                  <option value="electronics">Electronics</option>
                  <option value="entertainment">Entertainment</option>
                  <option value="home">Home &amp; Appliances</option>
                  <option value="arts">Arts &amp; Crafts</option>
                  <option value="office">Office &amp; Education</option>
                  <option value="others">Others</option>
            </select>
          </div>
            
          <div class="form-group">
            <label for="itemName">Item Name</label>
            <input type="text" class="form-control" name="itemName" placeholder="What are you lending out?">
          </div>
        
         <div class="form-group">    
            <label for="price">Price</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>  
            <input type="text" class="form-control" name="price">
          </div>   
        </div>
            
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" rows="5" id="item_info" name="item_info" placeholder="Tell us more about your item! E.g size, condition, colour etc..."><?php echo $data['description_info']; ?></textarea>
          </div>
            
              <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" placeholder="Preferred location for meet up">
          </div>
            
          <div class="form-group">
            <label for="exampleInputFile">Cover photo</label>
            <input type="file" id="photo">
          </div>
            
             <div class='form-group'>
                    <input class="btn btn-primary" type="submit" name="submit" value="List my item"/>
                    <?php echo $loanCreationErrorMessage;?>
                </div>
        </form>

    </div> <!-- /container -->

  </body>
</html>




