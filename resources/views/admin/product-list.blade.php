@extends('admin.app')

@section('content')
<div class="container">
	
	<a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
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
			<div class="modal-body" id="modalBody">
				<form id="productForm" name="productForm" class="form-horizontal" action="product-list/store" enctype="multipart/form-data">
					<input type="hidden" name="product_id" id="product_id">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" >
							<span id="title_error" class="required"></span>
						</div>
					</div> 
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Category</label>
						<div class="col-sm-12">
							<select class="form-control" id="category_id" name="category_id">
							    <option value="">Please category</option>
							        @foreach($categories as $category)
							         <option value="{{$category->id}}">{{$category->category_name}}</option>
							        @endforeach
							</select>
							<span id="category_id_error" class="required"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-12">
							<img src=""  id="show_image" height="55" width="55">
							<input type="file" class="form-control" id="image" name="image">
							<input type="hidden" class="form-control" id="is_image_changed" name="is_image_changed">
							<span id="image_error" class="required"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="price" name="price" placeholder="Enter Tilte" value="" maxlength="50" >
							<span id="price_error" class="required"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="">
							<span id="description_error" class="required"></span>
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
						<span id="title_error" class="required"></span>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/product-list.js')}}"></script>
@endsection
