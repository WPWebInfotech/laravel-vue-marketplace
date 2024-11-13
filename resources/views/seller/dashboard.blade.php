@extends('layouts.app')

@section('content')
    <div class="container">
        @if(auth()->check())
            <h1>Welcome {{ auth()->user()->name }}</h1>
        @else
            <h1>Welcome Guest</h1>
        @endif

        <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Add New Product</a>
    </div>
@endsection