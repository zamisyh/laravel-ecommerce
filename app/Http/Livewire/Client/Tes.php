<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Customer;

class Tes extends Component
{

    public $country = null;

    public function render()
    {
        return view('livewire.client.tes')->extends('layouts.auth');
    }

    public function createCustomer()
    {
        $data = Customer::create([
            'name' => 'itszami',
            'email' => 'itszami@gmail.com',
            'phone_number' => '081230012310',
            'address' => 'kepo'
        ]);

        return $data;
    }
}
