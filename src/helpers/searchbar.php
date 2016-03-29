<form action="?page=search" method="post">
	<div class="col-lg-8">
		<input type="hidden" name="action" value="search">
		<div class="input-group">
		    <input type="text" class="form-control" name="search" placeholder="Search for...">
		    <span class="input-group-btn">
		        <button class="btn btn-default" type="submit">Search!</button>
		    </span>
		</div><!-- /input-group -->
	</div>
	<div class="col-lg-4" style="padding-top: 6px;" data-toggle="modal" data-target="#advanceSearchModal">
		<a id="advance-search-button">advance search</a>
	</div>
</form>

<!-- Modal -->
<div class="modal fade" id="advanceSearchModal" tabindex="-1" role="dialog" aria-labelledby="advanceSearchModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="advanceSearchModal">Advance Search</h4>
			</div>
			<div class="modal-body">
				advance search options here
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Search</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#advance-search-button').css('cursor', 'pointer');
</script>


