<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;


class Shop extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchBox, $categoryBox;
    public $search, $categoryModel;
    public $filterBtn;
    public $title;
    public $pagesize = 6;
    public $filter;


    public function render()
    {
        $products = null;
        $category = null;

        if ($this->filter == 1) {
            $products = Product::where('status', '1')->with('category')->orderBy('created_at', 'DESC')->paginate(intval($this->pagesize));
            $this->title = 'New Product';
            $this->clearAll();
        } elseif ($this->filter == 2) {
            $products = Product::where('status', '1')->with('category')->orderBy('price', 'DESC')->paginate(intval($this->pagesize));
            $this->title = 'Product Price To High';
            $this->clearAll();
        } elseif ($this->filter == 3) {
            $products = Product::where('status', '1')->with('category')->orderBy('price', 'ASC')->paginate(intval($this->pagesize));
            $this->title = 'Product Price To Low';
            $this->clearAll();
        } elseif ($this->filter == 4) {
            $products = Product::where('status', '1')->with('category')->orderBy('price', 'ASC')->paginate(intval($this->pagesize));
            $this->title = 'Most Popular';
            $this->clearAll();
        } elseif ($this->filter == 5) {
            $products = Product::where('status', '1')->where('category_id', $this->categoryModel)->with('category')->orderBy('price', 'ASC')->paginate(intval($this->pagesize));
            $category = Category::orderByDesc('created_at')->get();

            $this->title = 'Category';
            $this->categoryBox = true;
            $this->clearSearch();
        } elseif ($this->filter == 6) {
            $products = Product::where('name', 'LIKE', '%' . $this->search . '%')->where('status', '1')->with('category')->orderBy('price', 'ASC')->paginate(intval($this->pagesize));
            $this->title = 'Searching ' . $this->search;
            $this->searchBox = true;
            $this->clearCategory();
        } else {
            $products = Product::where('status', '1')->with('category')->paginate(intval($this->pagesize));
        }
        return view('livewire.client.product.shop', compact('products', 'category'))->extends('layouts.client')->section('content');
    }


    public function filterBtn()
    {
        $this->filter = true;
    }

    public function clearAll()
    {
        $this->searchBox = false;
        $this->categoryBox = false;
    }
    public function clearSearch()
    {
        $this->searchBox = false;
    }
    public function clearCategory()
    {
        $this->categoryBox = false;
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
}
