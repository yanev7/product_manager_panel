@extends('layout.app')
@section('title', 'Products')
@section('content')
    <div class="card mt-5">
        <h2 class="card-header text-center"> Product Manager Panel </h2>
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-center">
                <a class="btn btn-success btn-md mt-4" href="{{ route('products.create') }}">Create New Product</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }} </td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="d-flex gap-2">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                                        View</a>

                                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">
                                        Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $products->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
