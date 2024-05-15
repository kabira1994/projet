<!-- resources/views/products/index.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Machines à Café</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Ajouter un produit</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
