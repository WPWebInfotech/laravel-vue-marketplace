@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" id="price" name="price" class="form-control" required>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success">Save Product</button>
            </div>
        </form>
    </div>
@endsection
