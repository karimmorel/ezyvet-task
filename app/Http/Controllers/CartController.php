<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;


/**
 * The CartService is used in order to manage the shopping cart
 */

class CartController extends Controller {


    public function add(Request $request, $name, CartService $shoppingCart)
    {
        $shoppingCart->addToCart($name);

        return redirect()->route('home');
    }

    public function remove(Request $request, $name, CartService $shoppingCart)
    {
        $shoppingCart->removeFromCart($name);

        return redirect()->route('home');
    }
}