@extends('admin.app')

@section('content')
<div class="container">
	
	<a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
	<br><br>
	<table class="table table-bordered table-striped" id="laravel_datatable">
		<thead>
			<tr>
			<th>ID</th>
			<th>S. No</th>
			<th>Order ID</th>
			<th>Title</th>
			<th>Category</th>
			<th>Image</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Mobile</th>
			<th>Address</th>
			<th>Order at</th>
			<!-- <th>Action</th> -->
			</tr>
		</thead>
	</table>
</div>

<script src="{{asset('js/order-list.js')}}"></script>
@endsection
