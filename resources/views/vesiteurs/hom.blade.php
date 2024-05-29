<!-- resources/views/clients/shop.blade.php -->

@extends('layouts.master')

@section('content')
  

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row product-lists">
                @foreach($products as $produit)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.showe', ['id' => $produit->id]) }}"><img src="{{ asset('storage/'.$produit->image) }}" alt="product image"></a>
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
    </div>
    <!-- end products -->
@endsection
