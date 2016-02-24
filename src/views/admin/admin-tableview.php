<div class='wrapper'>
	<table class= "table table-striped table-bordered table-hover dataTable" id="datatable">
		<thead>
			<tr>
				<th colspan="1" rowspan="1" style="width: 180px;" tabindex="0">
					ID
				</th>
				<th colspan="1" rowspan="1" style="width: 220px;" tabindex="0">
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
			</tr>
		</thead>
		<tbody>
			<tr class="odd">
				<td><span class="xedit" id="1">Test1a</span></td>
				<td>Test1b</td>
				<td>Test1c</td>
				<td>Test1c</td>
				<td>Test1c</td>
				<td>Test1c</td>
				<td>Test1c</td>
				<td><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
			</tr>
			<tr class="even">
				<td><span class="xedit" id="2">Test2a</span></td>
				<td>Test2b</td>
				<td>Test2c</td>
				<td><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
			</tr>
			<!-- Following PHP Code will go here -->
		</tbody>
	</table>
	<?php echo $content ?>
</div>

<script>
	
	jQuery(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
		$('.xedit').editable();
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
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
					}
				},
				error: function(e){
					alert('Error Processing your Request!!');
				}
			});
		});
	});
	
	function deleteRow(row) {
		var index = row.parentNode.parentNode.rowIndex; // getting row index of <tr>
		var response = window.confirm("Delete Row?");
		if (response === true) {
			document.getElementById("datatable").deleteRow(index);
			$.ajax({
				url: "index2.php",
				type: 'GET',
				success: function(s) {
					
				},
				error: function(e) {
					alert('error deleting');
				}
			});
		}
	}
</script>

<style>
	.wrapper {
	margin: 0 auto;
	width: 80%;
	padding-top: 5%;
	}
</style>