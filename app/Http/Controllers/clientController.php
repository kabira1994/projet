<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientController extends Controller
{

    public function showContactForm()
    {
        return view('clients.contact');
    }
    //
}
