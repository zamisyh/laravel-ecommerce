<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Home extends Component
{

    public $body;

    // protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.admin.home')->extends('layouts.app')->section('content');
    }

    public function create()
    {
        return dd($this->body);
    }
}
