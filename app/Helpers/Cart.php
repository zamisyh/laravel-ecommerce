<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    public function __construct()
    {
        if($this->get === null){
            $this->set($this->empty);
        }
    }

    public function add(Product $product)
    {
        $cart = $this->get();
        array_push($cart['products'], $product);
        $this->set($cart);
    }

    public function empty()
    {
        return [
            'products' => [],
        ];
    }

    public function get()
    {
        return session()->get('blanja-cart');
    }

    public function set($cart)
    {
        session()->put('blanja-cart', $cart);
    }
}
