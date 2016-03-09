<style>
	.wrapper {
	margin: 0 auto;
	width: 90%;
	padding-top: 5%;
	}
</style>

<div class='wrapper'>
	<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
		<thead>
			<?php if($_GET['action'] == 'member'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						ID
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Username
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Password
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Email
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Account Type
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Is Valid
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Created At
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Updated At
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Action
					</th>
				</tr>
			<?php endif; ?>
			<?php if($_GET['action'] == 'item'): ?>
				<tr>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						ID
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Item Name
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Category
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Price
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Description
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Location
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Owner ID
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Is Valid
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Created At
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Updated At
					</th>
					<th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">
						Action
					</th>
				</tr>
            <?php endif; ?>		
		</thead>
		<tbody>
			<!-- Following PHP Code will go here -->
			<?php echo $content ?>
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
			var gridContent = getContentOfGrid(row, col);
			
			console.log("table name: " + tableName);
			console.log("primary key: " + primaryKey);
			console.log("column name: " + colName);
			console.log("cell content: " + gridContent);
			
			// 5. perform ajax call to update database
			/*
			$.ajax({
				url: "process.php?id="+x+"&data="+y,
				type: 'GET',
				success: function(s){
					console.log(s);
					if(s == 'status'){
						$(z).html(y);
					}
					if(s == 'error') {
						alert('Error Processing your Request!');
						//location.reload();
					}
				},
				error: function(e){
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