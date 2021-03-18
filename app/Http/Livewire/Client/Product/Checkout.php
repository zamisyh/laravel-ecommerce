<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class Checkout extends Component
{

    public $cart;
    public $name, $email, $address, $notes;

    public $selectedCountry = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;

    public $cities = null;
    public $district = null;
    public $village = null;



    public function render()
    {

        $this->cart = CartBlanja::content();
        return view('livewire.client.product.checkout')->with([
            'countries' => Province::all()
        ])->extends('layouts.client')->section('content');
    }


    public function updated($saveOrder)
    {
        $this->validateOnly($saveOrder, [
            'name' => 'min:6|required|string',
            'email' => 'required|email',
            'address' => 'required',
            'notes' => 'required',
            'selectedCountry' => 'required',
            'selectedDistrict' => 'required',
            'selectedCity' => 'required',
            'selectedVillage' => 'required'

        ]);
    }

    public function updatedSelectedCountry($id)
    {
        $this->cities = Regency::where('province_id', $id)->get();
    }

    public function updatedSelectedCity($id)
    {
        $this->district = District::where('regency_id', $id)->get();
    }

    public function updatedSelectedDistrict($id)
    {
        $this->village = Village::where('district_id', $id)->get();
    }


    public function saveOrder()
    {
        $orderValidate = $this->validate([
            'name' => 'min:6|required|string',
            'email' => 'required|email',
            'address' => 'required',
            'notes' => 'required',
            'selectedCountry' => 'required',
            'selectedDistrict' => 'required',
            'selectedCity' => 'required',
            'selectedVillage' => 'required'
        ]);


        dd($orderValidate);
    }
}
