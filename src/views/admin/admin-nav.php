<!-- nav bar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="admin-index.php">WhoBorrow Admin</a>
		</div>
		<div class="navbar-collapse collapse navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Control Panel<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Manage Tables</li>
						<li><a href="admin-index.php?action=member">Members</a></li>
						<li><a href="admin-index.php?action=item">Items</a></li>
						<li><a href="admin-index.php?action=item_image">Item Images</a></li>
						<li><a href="admin-index.php?action=item_availability">Item Availability</a></li>
                        <li><a href="admin-index.php?action=loan_request">Loan Requests</a></li>
                        <li><a href="admin-index.php?action=comment">Item Comments</a></li>
						<li><a href="admin-index.php?action=review">Reviews</a></li>
						<li><a href="admin-index.php?action=message">Messages</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Others</li>
						<li><a href="admin-index.php?action=add-admin">Add Administrator</a></li>
						<li><a href="#">More Features Incoming...</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<p class="navbar-text">Logged in as <?php print $_SESSION['username']; ?></p>
				</li>
				<li class="dropdown">
					<p class="navbar-text"><a href="admin-index.php?action=logout">Logout</a></p>
				</li>
			</ul>
		</div>
	</div>
</div>