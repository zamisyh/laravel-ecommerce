<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;

class Tes extends Component
{

    public $country = null;

    public function render()
    {
        return view('livewire.client.tes')->extends('layouts.auth');
    }

    public function updatedCountry()
    {
        dd('work');
    }
}
