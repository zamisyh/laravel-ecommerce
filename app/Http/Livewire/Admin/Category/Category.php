<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class Category extends Component
{
    // protected $queryString = [;]

    public function render()
    {
        return view('livewire.admin.category.category')->extends('layouts.app')->section('content');
    }
}
