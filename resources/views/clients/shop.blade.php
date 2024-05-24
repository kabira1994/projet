<!-- resources/views/shop.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row product-lists">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 text-center {{ $product }}">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="#"><img src="{{ asset('storage/images/image.png' . $product->image) }}" alt="prodact image"></a>
                        </div>
                        <h3>{{ $product->name }}</h3>
                        <p class="product-price"><span>Per Kg</span> {{ $product->price }}$ </p>
                        <a href="{{ route('products.addToCart', ['id' => $product->id]) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                  
                </div>
            </div>
        </div>
        
    </div>
@endsection
