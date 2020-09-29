<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;


class HomeController extends Controller {

    public function index(Request $request, CartService $shoppingCart)
    {
        return view('home')
        ->with('products',  $shoppingCart->getProductsList())
        ->with('cart', $request->session()->get('cart'))
        ->with('cartTotalPrice', $shoppingCart->getCartTotalPrice());
    }
}