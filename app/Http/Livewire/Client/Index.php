<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;
class Index extends Component
{

    public $product_id;
    public $amount = 6;

    public function render()
    {

        $product['product']['slider'] = Product::where('status','1')->orderBy('created_at', 'DESC')->limit(3)->get();
        $product['product']['newArrivals'] = Product::where('status','1')->orderBy('created_at', 'DESC')->limit(3)->get();
        $product['product']['popularProduct'] = Product::where('status','1')->with('category')->orderBy('created_at', 'ASC')->take($this->amount)->get();
        return view('livewire.client.index', $product)->extends('layouts.client')->section('content');
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

    public function loadMore()
    {
        $this->amount += 3;
    }




}
