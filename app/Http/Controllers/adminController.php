<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display the appropriate dashboard based on user type.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();

        switch ($user->type_id) {
            case 1:
                // Client dashboard
                return view('client.shop');
            case 2:
                // Admin dashboard
                return view('admin.dashboard');
            default:
                // Default or error view
                return view('client.shop');
        }
    }
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
}
