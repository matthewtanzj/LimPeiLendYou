<div class='wrapper'>
	<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
		<thead>
			<?php if($_GET['action'] == 'member'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						username
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						password
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						salt
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						email
					</th>
                    <th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						user_info
					</th>
                    <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						display_pic
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						account_type
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						last_logged_in
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						action
					</th>
				</tr>
			<?php endif; ?>
			<?php if($_GET['action'] == 'item'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						item_name
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						owner
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						category
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						price
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						description
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						location
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						is_valid
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						created_at
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
            <?php if($_GET['action'] == 'item_image'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						item_name
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						owner
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						image_url
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						is_cover
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
            <?php if($_GET['action'] == 'item_availability'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						item_name
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						owner
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						date_start
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						date_end
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
            <?php if($_GET['action'] == 'loan_request'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						item_name
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						owner
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						borrower
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						date_start
					</th>
                    <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						date_end
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						status
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						price_offer
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						is_valid
					</th>
                    <th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						created_at
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
            <?php if($_GET['action'] == 'comment'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						item_name
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						owner
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						commenter
					</th>
					<th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						content
					</th>
                    <th colspan="1" rowspan="1" style="width: 20%;" tabindex="0">
						created_at
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
            <?php if($_GET['action'] == 'review'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						reviewer
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						reviewee
					</th>
					<th colspan="1" rowspan="1" style="width: 30%;" tabindex="0">
						content
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						has_like
					</th>
                    <th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						created_at
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
            <?php if($_GET['action'] == 'message'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						item_name
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						item_owner
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						sender
					</th>
					<th colspan="1" rowspan="1" style="width: 10%;" tabindex="0">
						receiver
					</th>
                    <th colspan="1" rowspan="1" style="width: 25%;" tabindex="0">
						content
					</th>
                    <th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						created_at
					</th>
					<th colspan="1" rowspan="1" style="width: 15%;" tabindex="0">
						action
					</th>
				</tr>
            <?php endif; ?>
		</thead>
		<tbody>
			<!-- Following PHP Code will go here -->
			<?php 
				include('controllers/tableController.php');
				$tableName = $_GET['action'];
				$tableController = new tableController();
				$content = $tableController->convertPostgresTableIntoHTML($tableName);
				echo $content;
			?>
		</tbody>
	</table>
</div>

<script>
	
	jQuery(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
		$('.xedit').editable();
		
		/*
		 * jQuery function for the live editing of table
		 * On the submission of edit, function will: 
		 * 1. retrieve table name
		 * 2. get primary key of the edited row
		 * 3. get column name of edited grid
		 * 4. get content of the edited grid
		 * 5. perform ajax call to update database
		 */
		$(document).on('click','.editable-submit',function(){
			//var childHTML = $(this).closest('td').children('span');
			//var gridContent = $('.input-sm').val();
			var editLocation = $(this).closest('td').children('span');
			var id = $(this).closest('td').children('span').attr('id');
			var row = id.split("_")[0];
			var col = id.split("_")[1];
			
			// 1. retrieve table name
			var tableName = getTableName();
			
			// 2. get primary key of the edited row
			var primaryKey = getContentOfGrid(row, 0);
			
			// 3. get column name of edited grid
			var colName = getContentOfGrid(0, col);
			
			// 4. get content of the edited grid
			var gridContent = $('.input-sm').val();
			
			console.log("table name: " + tableName);
			console.log("primary key: " + primaryKey);
			console.log("column name: " + colName);
			console.log("cell content: " + gridContent);
			var stubArray = [];
            stubArray.push(1);
            stubArray.push(2);
			// 5. perform ajax call to update database
            $.ajax({
                url: "controllers/tableController.php",
                type: "POST",
                data: {table: tableName, column: stubArray},
                success: function(s) {
                    console.log(s);
                },
                error: function(e) {
                    //console.log(e);
                }
            });
            /*
			$.ajax({
				url: "controllers/tableController.php?editTable=" + tableName + "&table=" + tableName + "&primaryKey=" + primaryKey + 
						"&colName=" + colName + "&value=" + gridContent,
				type: 'GET',
				success: function(s){
					console.log(s);
					//location.reload();
				},
				error: function(e){
					console.log(e);
					alert('Error: Invalid datatype!');
					//location.reload();
				}
			});
            */
		});
	});
	
	/*
		 * function for the live deletion of table
		 * On the submission of edit, function will: 
		 * 1. retrieve table name
		 * 2. get primary key of the row to be deleted
		 * 3. delete row in table on frontend
		 * 4. perform ajax call to update database
		 */
	function deleteRow(row) {
		
		var response = window.confirm("Confirm deletion of row?");
		
		if (response === true) {
			// 1. retrieve table name from the GET parameter
			var tableName = getTableName();
			
			// 2. get primary key of the row to be deleted		
			var index = row.parentNode.parentNode.rowIndex; // getting row index of <tr>
			var primaryKey = getContentOfGrid(index, 0); // get the primary key of the row to be deleted
	
			// 3. delete row in frontend
			document.getElementById("datatable").deleteRow(index);

			// 4. perform ajax call to update database
			$.ajax({
				url: "controllers/tableController.php?deleteKey=" + primaryKey + "&table=" + tableName,
				type: 'GET',
				success: function(s) {
					console.log(s);
					location.reload();
				},
				error: function(e) {
					console.log(e);
					location.reload();
				}
			});
		}
	}
	
	function getTableName() {
		return decodeURIComponent(window.location.search.match(/(\?|&)action\=([^&]*)/)[2]);
	}
	
	function getContentOfGrid (row, col) {
		// if getting content of table header (weird interaction as compared to table rows)
		// therefore, need to parse at a higher level (the whole header html)
		if (row == 0) {
			var element = document.getElementById("datatable").rows[0].innerHTML; // get header html
			var headers = element.split(/<(?:.|\n)*?>/gm); // split html via tags
			for (var i=0; i<headers.length; i++) 
				headers[i] = headers[i].trim();
			var counter = 0;
			// remove empty elements, end product = an array of table header
			while(counter != headers.length) {
				var string = headers[counter];
				if (string.length === 0) {
					headers.splice(counter,1);
				} else {
				counter++
				}
			}
			return headers[col];
		}
		else
		// else, just access grid and remove span tag
		{
			var element = $(document.getElementById("datatable").rows[row].cells[col].innerHTML); //convert string to JQuery element
			element.find("span").remove(); //remove span elements
			return element.html(); //get back string of primary key
		}
	}
	
</script>

<style>
	.wrapper {
	margin: 0 auto;
	width: 90%;
	padding-top: 5%;
	}
	
	span {
		word-break: break-all;
	}
</style>
