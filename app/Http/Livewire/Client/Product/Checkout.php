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
    // public $province, $districts, $regencies, $villages;

    // public $selecteddistricts = null;
    // public $selectedRegencies = null;
    // public $selectedVillages = null;

    public $states;
    public $cities;
    public $selectedState = NULL;


    public function mount()
    {
        $this->states = Province::all();
        // $this->districts = collect();
        $this->cities = collect();
        // $this->villages = collect();
    }

    public function render()
    {

        $this->cart = CartBlanja::content();
        return view('livewire.client.product.checkout')->extends('layouts.client')->section('content');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = Regency::where('regency_id', $state)->get();
        }
    }


    // public function updatedSelecteddistricts($districts)
    // {
    //     if(!is_null($districts)){
    //         $this->districts = District::where('regency_id', $districts)->get();
    //     }
    // }

    // public function updatedSelectedVillages($villages)
    // {
    //     $this->villages = Village::where('district_id', $villages)->get();
    // }





}
