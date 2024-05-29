<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;





class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $total = $subtotal + 45; // Assuming $45 for shipping

        return view('cart', compact('cart', 'subtotal', 'total'));
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    public function applyCoupon(Request $request)
    {
        // Handle coupon application logic here
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        // Assuming you have logic to calculate subtotal
        $subtotal = $this->calculateSubtotal();
    
        // Handle checkout logic here
        return view('checkout', ['subtotal' => $subtotal]);
    }

    public function show()
    {
        // Assuming you have logic to retrieve cart items and calculate subtotal
        $cartItems = $this->getCartItems();
        $subtotal = $this->calculateSubtotal();

        // Assuming you have logic to calculate total
        $total = $subtotal + $this->calculateShipping();

        // Pass $cartItems, $subtotal, and $total to the view
        return view('cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }

    // Placeholder methods for illustration, replace with your actual logic

    private function getCartItems()
    {
        // Logic to retrieve cart items
        return [
            ['name' => 'Product 1', 'price' => 10],
            ['name' => 'Product 2', 'price' => 20],
            ['name' => 'Product 3', 'price' => 15],
        ];
    }

    private function calculateSubtotal()
    {
        // Placeholder logic to calculate subtotal
        $cartItems = $this->getCartItems();
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item['price'];
        }

        return $subtotal;
    }

    private function calculateShipping()
    {
        // Placeholder logic to calculate shipping
        return 45;
    }
}

    //

