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
     
        <form class="col-md-6 col-md-offset-3" action='?page=loan' method='POST' enctype="multipart/form-data">
          <div class="form-group">
            <label for="categorySelection">Category</label>
              <select class="form-control" name="category">
                  <option value="null">Choose one</option>
                  <option value="Tools & Gardening">Tools &amp; Gardening</option>
                  <option value="Sports & Outdoor">Sports &amp; Outdoor</option>
                  <option value="Parties & Events">Parties &amp; Events</option>
                  <option value="Apparel & Accessories">Apparel &amp; Accessories</option>
                  <option value="Kids & Babies">Kids &amp; Babies</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Home & Appliances">Home &amp; Appliances</option>
                  <option value="Arts & Crafts">Arts &amp; Crafts</option>
                  <option value="Office & Education">Office &amp; Education</option>
                  <option value="Others">Others</option>
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
                <label for="availableDates">Available loan dates</label>  
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" id="start" name="start" />
                        <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" id="end" name="end" />
                  </div>
            </div>
            
              <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" placeholder="Preferred location for meet up">
          </div>
            
          <div class="form-group">
            <label for="exampleInputFile">Cover photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
              <?php echo $photoUploadErrorMessage;?>
          </div>
            
             <div class='form-group'>
                    <input class="btn btn-primary" type="submit" name="submit" value="List my item"/>
                    <?php echo $loanCreationErrorMessage;?>
                </div>
        </form>
             <a name="calendarTab" ></a>
    </div> <!-- /container -->
        
  </body>
</html>

<script>
    // set available dates in datepicker
     $('.input-daterange').datepicker();

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

    // allow submit to work if logged in
    <?php if($_SESSION['loggedin']): ?>
        $('.submit-button').prop('disabled', false);
    <?php else: ?>
        $('.submit-button').prop('disabled', true);
    <?php endif; ?> 

    // show alert if submit successfully
    <?php if ($submitSuccess): ?>
        $('.alert-success').show();
    <?php endif; ?>
    
    <?php if ($submitError): ?>
        $('.alert-danger').show();
    <?php endif; ?>

    // show comments
    <?php if(!empty($commentArray)) {foreach ($commentArray as $comment) { ?>
        $('#show-comments-section').append("<ul><b><?php echo $comment['commenter'] ?></b><span style='color:grey; font-size:12px; padding-left:30px;'><?php echo date('d/m/Y', $comment['timestamp']) ?><span style='color:grey; font-size:12px; padding-left:5px;'><?php echo date('g:i a', $comment['timestamp']) ?></span><p><?php echo $comment['content'] ?></p></ul>");
    <?php }} ?>
    


  
</script>





