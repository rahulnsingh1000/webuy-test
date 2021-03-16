@extends('app')

@section('content')
<div class="container">
	<h2>Laravel DataTable Ajax Crud Tutorial - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
	<br>
	<a href="https://www.tutsmake.com/how-to-install-yajra-datatables-in-laravel/" class="btn btn-secondary">Back to Post</a>
	<a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-product">Add New</a>
	<br><br>
	<table class="table table-bordered table-striped" id="laravel_datatable">
		<thead>
			<tr>
			<th>ID</th>
			<th>S. No</th>
			<th>Title</th>
			<th>Category</th>
			<th>Image</th>
			<th>Price</th>
			<th>Description</th>
			<th>Created at</th>
			<th>Action</th>
			</tr>
		</thead>
	</table>
</div>
<div class="modal fade" id="ajax-product-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="productCrudModal"></h4>
			</div>
			<div class="modal-body">
				<form id="productForm" name="productForm" class="form-horizontal">
					<input type="hidden" name="product_id" id="product_id">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
						</div>
					</div> 
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Category</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="category_id" name="category_id" placeholder="Enter Tilte" value="" maxlength="50" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="image" name="image" placeholder="Enter Tilte" value="" maxlength="50" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="price" name="price" placeholder="Enter Tilte" value="" maxlength="50" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
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
