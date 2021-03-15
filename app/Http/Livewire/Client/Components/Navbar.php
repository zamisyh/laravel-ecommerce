<?php

namespace App\Http\Livewire\Client\Components;


use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;


use Livewire\Component;

class Navbar extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'cartAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount()
    {
        $this->cartTotal = count(CartBlanja::content());
    }

    public function render()
    {
        return view('livewire.client.components.navbar');
    }


    public function updateCartTotal()
    {
        $this->cartTotal = count(CartBlanja::content());

    }
}
