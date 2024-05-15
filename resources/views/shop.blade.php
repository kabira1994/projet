<!-- resources/views/shop.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Nos Machines à Café</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Prix: </strong>{{ $product->price }} €</p>
                            <p class="card-text"><strong>Stock: </strong>{{ $product->stock }}</p>
                            <a href="#" class="btn btn-primary">Acheter</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
