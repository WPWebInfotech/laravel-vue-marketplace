@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Search Form -->
    <form method="GET" action="{{ url('/') }}">
        <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <h1 class="my-4">All Products</h1>

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
    <div class="row">
        <!-- Pagination Links -->
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection