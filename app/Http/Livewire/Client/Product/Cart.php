<?php

namespace App\Http\Livewire\Client\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;
use App\Models\Product;


class Cart extends Component
{



    public $cart;
    public $totalPrice;
    public $countPrice;
    public $qty;
    public $redirectCheckout = 0;
    public $productId;


    protected $listeners = [
        'confirmed',
        'cancelled'
    ];


    public function render()
    {
        $this->cart = CartBlanja::content();
        return view('livewire.client.product.cart')->extends('layouts.client')->section('content');
    }


    public function removeItem($rowId)
    {


        $this->productId = $rowId;
        $this->confirmCheckout();
        $this->emit('productRemoved');
    }

    public function checkout()
    {

        $this->redirectCheckout = true;

    }

    public function confirmCheckout()
    {
        $this->confirm('Are you sure you want to buy this item?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Nope',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }



    public function confirmed()
    {
        $this->alert('success', 'Success deleting products');
        CartBlanja::remove($this->productId);
        $this->emit('clearCart');

    }

    public function cancelled()
    {
        $this->alert('info', 'Okeyyy, lets buy more products!');

    }

    public function increment($id)
    {
        $product = CartBlanja::get($id);
        CartBlanja::update($id, $product->qty + 1);



    }

    public function decrement($id)
    {
        $product = CartBlanja::get($id);
        $product->qty <= 1 ? $product->qty + 1 : CartBlanja::update($id, $product->qty - 1);



    }



}
