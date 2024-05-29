@extends('layouts.master2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Product</h1>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Product Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="Product Image" width="100">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
