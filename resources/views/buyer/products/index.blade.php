@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ __('Available Products')}}</h1>
    <!-- Bootstrap Grid to display products -->
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection