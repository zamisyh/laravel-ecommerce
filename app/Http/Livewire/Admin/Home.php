<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Home extends Component
{

    public $body;

    protected $listeners  = [
        'logout' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.admin.home')->extends('layouts.app')->section('content');
    }


}
