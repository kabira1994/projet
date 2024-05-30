@extends('layouts.master')
@section('content')

<!-- single product -->
<div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> ${{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form">
                            <form action="{{ route('products.addToCart', ['id' => $product->id]) }}" method="POST">
                                <input type="number" placeholder="0">
                                <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                            <p><strong>Categories: </strong>{{ $product->categories }}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <!-- Your existing more products section -->
        </div>
    </div>
    <!-- end more products -->

@endsection