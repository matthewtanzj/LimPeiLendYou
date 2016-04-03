<?php
	include('models/tableModel.php');
	include('models/memberModel.php');
	$tableModel = new tableModel();
	$memberModel = new memberModel();
?>

<div class="wrapper">
	<div class="col-md-10">
            <h1>Statistics</h1>
            <div class="panel panel-info">
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">User</a></li>
                        <li role="presentation"><a href="#positive" aria-controls="profile" role="tab" data-toggle="tab">Loans</a></li>
                        <li role="presentation"><a href="#negative" aria-controls="home" role="tab" data-toggle="tab">Items</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane fade in active" id="description">
                            <div class="col-lg-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Total Users:</td>
                                            <td>Programming</td>
                                        </tr>
                                        <tr>
                                            <td>Hire date:</td>
                                            <td>06/23/2013</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>01/24/1988</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>Male</td>
                                        </tr>
                                        <tr>
                                            <td>Home Address</td>
                                            <td>Metro Manila,Philippines</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:info@support.com">info@support.com</a></td>
                                        </tr>
                                            <td>Phone Number</td>
                                            <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="positive">
                            <div class="col-lg-12">
                                <br>
                                <!-- review table -->
                                <div class="review-table">
                                    <table class="table table-hover">
                                        <thead>
                                            <th class="col-md-6">Review</th>
                                            <th class="col-md-2">Reviewer</th>
                                            <th class="col-md-2">Date</th>
                                        </thead>
                                        <?php
                                            for($i = 0; $i < sizeof($reviewArray); $i++) {
                                                if ($reviewArray[$i][2] == 0) continue;
                                                echo '<tr class="success">';
                                                echo '<td><div id="review-content">'. $reviewArray[$i][1] .'</div></td>';
                                                echo '<td><div id="username">'. $reviewArray[$i][0] .'</div></td>';
                                                echo '<td><div id="timestamp">10 feb 2016</div></td>';
                                                echo '<tr>';
                                            }
                                        ?>
                                    </table>
                                </div> 
                                <!-- end of review table-->
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="negative">
                            <div class="col-lg-12">
                                <br>
                                <!-- review table -->
                                <div class="review-table">
                                    <table class="table table-hover">
                                        <thead>
                                            <th class="col-md-6">Review</th>
                                            <th class="col-md-2">Reviewer</th>
                                            <th class="col-md-2">Date</th>
                                        </thead>
                                        <?php
                                            for($i = 0; $i < sizeof($reviewArray); $i++) {
                                                if ($reviewArray[$i][2] == 1) continue;
                                                echo '<tr class="danger">';
                                                echo '<td><div id="review-content">'. $reviewArray[$i][1] .'</div></td>';
                                                echo '<td><div id="username">'. $reviewArray[$i][0] .'</div></td>';
                                                echo '<td><div id="timestamp">10 feb 2016</div></td>';
                                                echo '<tr>';
                                            }
                                        ?>
                                    </table>
                                </div> 
                                <!-- end of review table-->
                            </div>
                        </div>
                        
                    </div>
                </div>    
            </div>         

	</div>
</div>

<style>
	.wrapper {
	margin: 0 auto;
	width: 90%;
	padding-top: 5%;
	}
</style>