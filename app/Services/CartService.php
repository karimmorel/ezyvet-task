<?php

namespace App\Services;

use Illuminate\Http\Request;

class CartService {

    /**
     * List of products
     */
    private $products = [
        ['name' => 'Sledgehammer', 'price' => 125.75],
        ['name' => 'Axe', 'price' => 190.50],
        ['name' => 'Bandsaw', 'price' => 562.131],
        ['name' => 'Chisel', 'price' => 12.9],
        ['name' => 'Hachsaw', 'price' => 18.45],
    ];

    private $shoppedProducts = array();


    public function __construct(Request $request)
    {
        $this->request = $request;

        if($request->session()->has('cart'))
        {
            $this->shoppedProducts = $request->session()->get('cart');
        }
    }


    /**
     * Add a product to the cart
     */
    public function addToCart(string $product)
    {
        if(array_key_exists($product, $this->shoppedProducts))
        {
            $this->shoppedProducts[$product]['quantity']++;
        }
        else
        {
            // Get the appropriate product's price from the array
            foreach ($this->products as $storedProduct)
            {
                if($storedProduct['name'] == $product)
                {
                    $price = round($storedProduct['price'], 2);
                }
            }

            $this->shoppedProducts[$product] = array(
                'price' => $price,
                'quantity' => 1
            );
        }

        $this->refreshCartInSession();
    }

    /**
     * Remove a product from the cart
     */
    public function removeFromCart(string $product)
    {
        if(array_key_exists($product, $this->shoppedProducts))
        {
            unset($this->shoppedProducts[$product]);
        }

        $this->refreshCartInSession();
    }


    /**
     * Refresh the value of the shopping cart stored in session
     */
    private function refreshCartInSession() 
    {
        $this->request->session()->put('cart', $this->shoppedProducts);
    }

    // Used to get the list of stored product in the view
    public function getProductsList() : array
    {
        return $this->products;
    }

    public function getCartTotalPrice() : float
    {
        $total = 0;

        foreach ($this->shoppedProducts as $product)
        {
            $total += ($product['price'] * $product['quantity']);
        }

        return $total;
    }
}