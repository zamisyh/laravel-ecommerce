<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;


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

    public function addToCart(int $id)
    {
        $product = Product::where('id', $id)->first();

        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'qty' => 1,
            'price' => $product->price,
            'weight' => $product->weight,
            'description' => $product->description,
            'image' => $product->image,
            'status' => $product->status,
            'category_id' => $product->category_id
        ];

        CartBlanja::add($data)->associate('products');
        // CartBlanja::instance('checkout')->add($data)->associate('products');


        $this->alert('success', 'Product has been successfully added to cart!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);



        $this->emit('cartAdded');
    }


}
