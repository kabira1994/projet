
@extends('layouts.master')

@section('content')
  

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <tr class="table-body-row">
                                            <td class="product-remove"><a href="{{ route('cart.remove', $id) }}"><i class="far fa-window-close"></i></a></td>
                                            <td class="product-image"><img src="{{ asset('storage/' . $details['image']) }}" alt=""></td>
                                            <td class="product-name">{{ $details['name'] }}</td>
                                            <td class="product-price">${{ $details['price'] }}</td>
                                            <td class="product-quantity">
                                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                                    @csrf
                                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                </form>
                                            </td>
                                            <td class="product-total">${{ $details['price'] * $details['quantity'] }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="table-body-row">
                                        <td colspan="6" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>${{ $subtotal }}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>${{ $total }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="{{ route('cart.show') }}" class="boxed-btn">Update Cart</a>
                            <a href="{{ route('checkout') }}" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="{{ route('cart.applyCoupon') }}" method="POST">
                                @csrf
                                <p><input type="text" name="coupon_code" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->

    @endsection