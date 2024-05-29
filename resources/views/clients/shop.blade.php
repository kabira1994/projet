<!-- resources/views/clients/shop.blade.php -->

@extends('layouts.master')

@section('content')
    <!-- Product List Section -->
    <div class="row product-lists">
        @foreach($products as $produit)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="#"><img src="{{ asset($produit->image) }}" alt="product image"></a>
                    </div>
                    <h3>{{ $produit->name }}</h3>
                    <p class="product-price"><span>Per Kg</span> {{ $produit->price }}$ </p>
                    <form action="{{ route('products.addToCart', ['id' => $produit->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="pagination-wrap">
                <!-- Pagination logic if needed -->
            </div>
        </div>
    </div>
</div>
@endsection