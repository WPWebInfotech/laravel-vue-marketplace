@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('seller.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Product Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
</div>
@endsection
