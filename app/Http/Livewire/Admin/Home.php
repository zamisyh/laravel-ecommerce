<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.admin.home')
        ->extends('layouts.admin.app');
    }
}
