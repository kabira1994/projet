<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;


use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function hom () {
        $products = Product::all();
        return view('vesiteurs.hom', compact('products'));
    }
   
   
  
    
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products/images', 'public');
           
            $validatedData['image'] = $imagePath;
        }
    
        Product::create($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');
    }
    

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('single-product', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = 'storage/' . $imagePath;
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès');
    }
    public function destroy($id)
    {
        // Rechercher le produit par son ID
        $product = Product::findOrFail($id);

        // Supprimer le produit
        $product->delete();

        // Rediriger vers la liste des produits avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès');
    }
    public function addToCart($id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        return view('cart');
    }
    

}
