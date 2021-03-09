<?php

namespace App\Http\Livewire\Client\Product;
use Livewire\Component;
use App\Facades\Cart as CartDetail;
use App\Models\Product;

class Cart extends Component
{

    public $cart;
    public $totalPrice, $subtotalPrice;


    public function mount()
    {
        $this->cart = CartDetail::get();
    }

    public function render()
    {
        return view('livewire.client.product.cart')->extends('layouts.client')->section('content');
    }


    public function removeItem($productId)
    {


        CartDetail::remove($productId);
        $this->cart = CartDetail::get();
        $this->emit('productRemoved');
    }

    public function checkout()
    {
        CartDetail::clear();
        $this->emit('clearCart');
        $this->cart = CartDetail::get();
    }
}
