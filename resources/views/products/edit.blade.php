@extends('layout.app')
@section('title', 'Edit Product')
@section('content')

    <div class="card mt-5">
        <h2 class="card-header text-center">Edit Product</h2>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name"
                        placeholder="Name">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Description</strong></label>
                    <textarea class="form-control" style="height: 150px" name="description" id="description" placeholder="Description">{{ $product->description }}</textarea>
                    @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Price</strong></label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0"
                        placeholder="Enter product price" required value="{{ $product->price }}">
                    @if ($errors->has('price'))
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-success">Update</button>

                    <a class="btn btn-primary btn-md" href="{{ route('products.index') }}">Cancel</a>

                    <a class="btn btn-secondary btn-md ms-auto"
                        href="{{ $previous_url ?? route('products.index') }}">Back</a>
                </div>
        </div>
        </form>
    </div>
@endsection
