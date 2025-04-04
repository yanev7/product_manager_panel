@extends('layout.app')
@section('title', 'Create Product')
@section('content')
    <div class="card mt-5">
        <h2 class ="card-header text-center">Create new product</h2>
        <div class="card-body">

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter product name" required
                        value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Description</strong></label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter product description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div class="text-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Price</strong></label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0"
                        placeholder="Enter product price" required value="{{ old('price') }}">
                    @if ($errors->has('price'))
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>

                <div class="d-flex gap-3 d-md-flex justify-content-md-start">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-primary btn-md" href="{{ route('products.index') }}">Cancel</a>
                </div>

            </form>
        </div>
    </div>
@endsection
