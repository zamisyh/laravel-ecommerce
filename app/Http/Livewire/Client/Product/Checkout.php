<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;

class Checkout extends Component
{


    public function render()
    {

        return view('livewire.client.product.checkout')->extends('layouts.client')->section('content');
    }
}
