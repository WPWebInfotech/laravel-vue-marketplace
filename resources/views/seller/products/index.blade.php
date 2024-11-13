@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1>My Products</h1>

    <a href="{{ route('seller.products.create') }}" class="btn btn-primary">Add New Product</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('seller.products.delete', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection