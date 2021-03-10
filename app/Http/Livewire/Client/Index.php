<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;
use App\Facades\Cart;

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
        // $carts = json_decode($this->product_id->cookie('blanja-carts'), true);

        // if($carts && array_key_exists($this->product_id, $carts)){
        //     $carts[$this->product_id]['qty'] += $this->qty;
        // }else{
        //     $product = Product::where('id', $this->product_id);

        //     $carts[$this->product_id] = [
        //         'qty' => $this->qty,
        //         'product_id' => $product->id,
        //         'name' => $product->name,
        //         'price' => $product->price,
        //         'image' => $product->image,
        //     ];
        // }

        // $cookie = cookie('blanja-carts', json_encode($carts), 2800);

        // return redirect()->back()->cookie($cookie);

        Cart::add(Product::where('id', $id)->first());
        $this->emit('cartAdded');


    }

    public function loadMore()
    {
        $this->amount += 3;
    }




}
