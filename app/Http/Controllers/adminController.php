<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;



class adminController extends Controller
{
    /**
     * Display the appropriate dashboard based on user type.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();

        $user = Auth::user();

        if ($user->type_id == 0) {
            return view('admin.dashboard')->with([
                'totalProducts' => $totalProducts,
                'totalUsers' => $totalUsers,
            ]);
        } else {
            // Rediriger si l'utilisateur n'est pas admin
            return redirect()->route('vesiteurs.hom')->with('error', 'Access denied.');
        }

    }

    /**
     * Display the shop for regular users.
     *
     * @return \Illuminate\View\View
     */
    public function shop()
    {
        $user = Auth::user();

        if ($user->type_id == 1) {
            $products = Product::all();

            return view('vesiteurs.hom', compact('products'));
        }

        return redirect()->route('dashboard.index')->with('error', 'Access denied.');
    }

    /**
     * Display the shop for regular users.
     *
     * @return \Illuminate\View\View
     */
   
    
      /**
     * Handle user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed...
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {

        return view('auth.register'); // Créez cette vue pour afficher le formulaire d'inscription
    }

    public function register(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
           // Check if the user already exists
    if (User::where('email', $request->email)->exists()) {
        return back()->withErrors(['email' => 'Email already exists']);
    }

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Authentifier l'utilisateur
        auth()->login($user);

        // Rediriger l'utilisateur vers la page appropriée après l'inscription
        return redirect('/dashboard');
    }
    public function index()
    {
        // Logique pour afficher la page d'index
        return view('admin.dashboard'); // Assurez-vous que cette vue existe dans resources/views/admin/dashboard.blade.php
    }
    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
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
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    
   

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function showUsers()
    {
        // Logique pour récupérer les utilisateurs du client depuis la base de données
        $users = User::where('id', auth()->user()->id)->get();

        // Passer les utilisateurs récupérés à la vue pour l'affichage
        return view('clients.users', compact('users'));
    }
    public function destroy($id)
    {
        // Récupérer le produit par son ID
        $product = Product::find($id);

        // Si le produit existe, le supprimer
        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
        }

        // Si le produit n'existe pas, retourner une erreur
        return redirect()->route('products.index')->with('error', 'Produit non trouvé.');
    }
}
