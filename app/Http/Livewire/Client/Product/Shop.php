<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Shop extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter, $searchBox, $categoryBox;
    public $search, $categoryModel;
    public $filterBtn;
    public $title;



    public function render()
    {
        $products = null;
        $category = null;

        if ($this->filter == 1) {
            $products = Product::where('status', '1')->with('category')->orderBy('created_at', 'DESC')->get();
            $this->title = 'New Product';
            $this->clearAll();
        } elseif ($this->filter == 2) {
            $products = Product::where('status', '1')->with('category')->orderBy('price', 'DESC')->get();
            $this->title = 'Product Price To High';
            $this->clearAll();
        } elseif ($this->filter == 3) {
            $products = Product::where('status', '1')->with('category')->orderBy('price', 'ASC')->get();
            $this->title = 'Product Price To Low';
            $this->clearAll();
        } elseif ($this->filter == 4) {
            $products = Product::where('status', '1')->with('category')->orderBy('price', 'ASC')->get();
            $this->title = 'Most Popular';
            $this->clearAll();
        } elseif ($this->filter == 5) {
            $products = Product::where('status', '1')->where('category_id', $this->categoryModel)->with('category')->orderBy('price', 'ASC')->get();
            $category = Category::orderByDesc('created_at')->get();

            $this->title = 'Category';
            $this->categoryBox = true;
            $this->clearSearch();
        } elseif ($this->filter == 6) {
            $products = Product::where('name', 'LIKE', '%' . $this->search . '%')->where('status', '1')->with('category')->orderBy('price', 'ASC')->get();
            $this->title = 'Searching ' . $this->search;
            $this->searchBox = true;
            $this->clearCategory();
        } else {
            $products = Product::where('status', '1')->with('category')->get();
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
}