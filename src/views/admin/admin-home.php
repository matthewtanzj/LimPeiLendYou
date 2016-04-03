<?php
	include('models/tableModel.php');
	include('models/memberModel.php');
    include('models/loanModel.php');
    include('models/itemModel.php');
	$tableModel = new tableModel();
	$memberModel = new memberModel();
    $itemModel = new itemModel();
?>

<div class="wrapper">
	<div class="col-md-10">
            <h1>Statistics</h1>
            <div class="panel panel-info">
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#user" aria-controls="home" role="tab" data-toggle="tab">User</a></li>
                        <li role="presentation"><a href="#items" aria-controls="profile" role="tab" data-toggle="tab">Items</a></li>
                        <li role="presentation"><a href="#loans" aria-controls="home" role="tab" data-toggle="tab">Loans</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane fade in active" id="user">
                            <div class="col-lg-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Total Registered Users</td>
                                            <td><?php echo $memberModel->getTotalUsers(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Users Online (Past week)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Users Online (Past month)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Users Online (Past Year)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastYear(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="items">
                            <div class="col-lg-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Total Items Created</td>
                                            <td><?php echo $memberModel->getTotalUsers(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Item Images</td>
                                            <td><?php echo $memberModel->getTotalUsersPastWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Users Online (Past month)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Users Online (Past Year)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastYear(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="loans">
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
    
    tr, th, td {
        border-bottom: 1px solid #A9A9A9;
    }
</style>