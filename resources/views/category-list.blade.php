<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Laravel DataTable Ajax Crud Tutorial - Tuts Make</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
		<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
		
	</head>
	<body>
		<div class="container">
			<h2>Laravel DataTable Ajax Crud Tutorial - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
			<br>
			<a href="https://www.tutsmake.com/how-to-install-yajra-datatables-in-laravel/" class="btn btn-secondary">Back to Post</a>
			<a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-category">Add New</a>
			<br><br>
			<table class="table table-bordered table-striped" id="laravel_datatable">
				<thead>
					<tr>
					<th>ID</th>
					<th>S. No</th>
					<th>Category Name</th>
					<th>Status</th>
					<th>Created at</th>
					<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
		<div class="modal fade" id="ajax-category-modal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="categoryCrudModal"></h4>
					</div>
					<div class="modal-body">
						<form id="categoryForm" name="categoryForm" class="form-horizontal">
							<input type="hidden" name="category_id" id="category_id">
							
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Category</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Tilte" value="" maxlength="50" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="status" name="status" placeholder="Enter Status" value="" maxlength="50" required="">
								</div>
							</div>
							
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
							</div>
						</form>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
	var SITEURL = '{{URL::to('/')}}'+'/';
	$(document).ready( function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('#laravel_datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: SITEURL + "category-list",
				type: 'GET',
			},
			columns: [
			{data: 'id', name: 'id', 'visible': false},
				{data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
				{ data: 'category_name', name: 'category_name' },
				{ data: 'status', name: 'status' },
				{ data: 'created_at', name: 'created_at' },
				{data: 'action', name: 'action', orderable: false},
			],
			order: [[0, 'desc']]
		});
		/*  When user click add user button */
		$('#create-new-category').click(function () {
			$('#btn-save').val("create-category");
			$('#category_id').val('');
			$('#categoryForm').trigger("reset");
			$('#categoryCrudModal').html("Add New Category");
			$('#ajax-category-modal').modal('show');
		});
		/* When click edit user */
		$('body').on('click', '.edit-item', function () {
			var category_id = $(this).data('id');
			$.get('category-list/' + category_id +'/edit', function (data) {
				$('#title-error').hide();
				$('#category_code-error').hide();
				$('#description-error').hide();
				$('#categoryCrudModal').html("Edit Category");
				$('#btn-save').val("edit-item");
				$('#ajax-category-modal').modal('show');
				$('#category_id').val(data.id);
				$('#category_name').val(data.category_name);
				$('#status').val(data.status);
			})
		});
		$('body').on('click', '#delete-item', function () {
			var category_id = $(this).data("id");
			if(confirm("Are You sure want to delete !")){
				$.ajax({
					type: "get",
					url: SITEURL + "category-list/delete/"+category_id,
					success: function (data) {
						var oTable = $('#laravel_datatable').dataTable(); 
						oTable.fnDraw(false);
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
			}
		}); 
	});
	if ($("#categoryForm").length > 0) {
		$("#categoryForm").validate({
			submitHandler: function(form) {
				var actionType = $('#btn-save').val();
				$('#btn-save').html('Sending..');
				$.ajax({
					data: $('#categoryForm').serialize(),
					url: SITEURL + "category-list/store",
					type: "POST",
					dataType: 'json',
					success: function (data) {
						$('#categoryForm').trigger("reset");
						$('#ajax-category-modal').modal('hide');
						$('#btn-save').html('Save Changes');
						var oTable = $('#laravel_datatable').dataTable();
						oTable.fnDraw(false);
					},
					error: function (data) {
						console.log('Error:', data);
						$('#btn-save').html('Save Changes');
					}
				});
			}
		})
	}
</script>
</html>