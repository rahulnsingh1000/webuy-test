@extends('admin.app')

@section('content')
<div class="container">
	
	<a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
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
			<div class="modal-body" id="modalBody">
				<form id="categoryForm" name="categoryForm" class="form-horizontal" action="category-list/store" enctype="multipart/form-data">
					<input type="hidden" name="category_id" id="category_id">
					
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Category</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Tilte" value="" maxlength="50">
							<span id="category_name_error" class="required"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-12">
							
							<select class="form-control" id="status" name="status">
							    <option value="">Please status</option>
							        <option value="1">Active</option>
							        <option value="2">In Active</option>
							</select>
							<span id="status_error" class="required"></span>
						</div>
					</div>
					
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/category-list.js')}}"></script>
@endsection