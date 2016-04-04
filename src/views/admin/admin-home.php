<?php
	include('models/tableModel.php');
	include('models/memberModel.php');
    include('models/loanRequestModel.php');
    include('models/itemModel.php');
    include('models/reviewModel.php');
    $loanRequestModel = new loanRequestModel();
	$tableModel = new tableModel();
	$memberModel = new memberModel();
    $itemModel = new itemModel();
    $reviewModel = new reviewModel();
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
                        <li role="presentation"><a href="#loans" aria-controls="home" role="tab" data-toggle="tab">Messages</a></li>
                        <li role="presentation"><a href="#loans" aria-controls="home" role="tab" data-toggle="tab">Others</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane fade in active" id="user">
                            <div class="col-lg-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Registered Users</td>
                                            <td><?php echo $memberModel->getTotalUsers(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Users Online (Past week)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Users Online (Past month)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Users Online (Past Year)</td>
                                            <td><?php echo $memberModel->getTotalUsersPastYear(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Reviews</td>
                                            <td><?php echo $reviewModel->getTotalReviews(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Users with no items put up</td>
                                            <td>3</td>
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
                                            <td>Items Created</td>
                                            <td><?php echo $itemModel->getTotalItems(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Items Created (Past Week)</td>
                                            <td><?php echo $itemModel->getTotalItemsPastWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Items Created (Past month)</td>
                                            <td><?php echo $itemModel->getTotalItemsPastMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Items Created (Past Year)</td>
                                            <td><?php echo $itemModel->getTotalItemsPastYear(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Item Images</td>
                                            <td><?php echo $itemModel->getTotalItemImages(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="loans">
                            <div class="col-lg-12">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Loan Requests Made</td>
                                            <td><?php echo $loanRequestModel->getTotalLoanRequests(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Loan Requests Made (Past Week)</td>
                                            <td><?php echo $loanRequestModel->getTotalLoanRequestsPastWeek(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Loan Requests Made (Past Month)</td>
                                            <td><?php echo $loanRequestModel->getTotalLoanRequestsPastMonth(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Loan Requests Made (Past Year)</td>
                                            <td><?php echo $loanRequestModel->getTotalLoanRequestsPastYear(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Successful Loan Requests</td>
                                            <td><?php echo $loanRequestModel->getTotalSuccessfulLoanRequests(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pending Loan Requests</td>
                                            <td><?php echo $loanRequestModel->getTotalPendingLoanRequests(); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Declined Loan Requests</td>
                                            <td><?php echo $loanRequestModel->getTotalDeclinedLoanRequests(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
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