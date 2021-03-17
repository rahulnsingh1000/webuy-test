@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="product-list" class="btn btn-secondary">Product</a>
                    <a href="category-list" class="btn btn-secondary">Categories</a>
                    <a href="order-list" class="btn btn-secondary">Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
