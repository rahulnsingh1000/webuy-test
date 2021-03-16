//var SITEURL = '{{URL::to('/')}}'+'/';
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