<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        // Logica per recuperare i prodotti nel carrello,
        // calcolare il totale, ecc.
        return 'cart';
        //return view('cart.index'); // Visualizza una vista del carrello
    }
}
