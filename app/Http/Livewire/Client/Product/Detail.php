<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Detail extends Component
{

    public $product;
    public $plus, $min;
    public $price = 0;
    public $count;

   
  
    public function mount($slug)
    {
        $this->product = Product::with('category')->where('slug', $slug)->first();
        
    }

    public function updateCount()
    {
       $this->price = $this->product->price * $this->count; 
       $this->emitSelf('countUpdate ');
    }



    public function render()
    {
        return view('livewire.client.product.detail')->extends('layouts.client')->section('content');
    }


}
