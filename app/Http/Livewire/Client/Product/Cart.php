<?php

namespace App\Http\Livewire\Client\Product;
use Livewire\Component;
use App\Facades\Cart as CartDetail;
use App\Models\Product;

class Cart extends Component
{

    public $cart;
    public $totalPrice, $subtotalPrice;


    protected $listeners = [
        'confirmed',
        'cancelled'
    ];

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

        $this->alert('success', 'Product has been successfully deleted', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
      ]);


        $this->emit('productRemoved');
    }

    public function checkout()
    {

        $this->confirmCheckout();
        $this->cart = CartDetail::get();
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
        $this->alert('success', 'Success, redirect to page confirmation');
        CartDetail::clear();
        $this->emit('clearCart');
        $this->cart = CartDetail::get();
    }

    public function cancelled()
    {
        $this->alert('info', 'Okeyyy, lets buy more products!');
        $this->cart = CartDetail::get();
    }
}
