@extends('layout.app')
@section('title', 'View Product')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">View Product</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-flex gap-2">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary btn-md" href="{{ route('products.edit', $product->id) }}">
                        Edit</a>

                    <button type="submit" class="btn btn-danger btn-md"
                        onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                </form>

                <a class="btn btn-secondary btn-md" href="{{ $previous_url ?? route('products.index') }}">
                    Back</a>
            </div>

            <div class="card mt-4 mb-3">
                <div class="card-body shadow">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>

                            <tr>
                                <th> Description</th>
                                <td>{{ $product->description }}</td>
                            </tr>

                            <tr>
                                <th>Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                </div>
            </div>
        </div>
    </div>
@endsection
