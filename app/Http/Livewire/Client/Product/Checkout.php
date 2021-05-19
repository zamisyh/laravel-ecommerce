<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as CartBlanja;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\CustomerDetail;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;



class Checkout extends Component
{

    public $cart;
    public $name, $email, $address, $notes, $notelp, $weight;

    public $selectedCountry = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;
    public $selectedCourier = null;

    public $cities = null;
    public $district = null;
    public $village = null;
    public $service = null;
    public $toLogin;

    public $origin, $destination, $courier;



    public function render()
    {



        $this->cart = CartBlanja::content();
        $response = Http::withHeaders([
            'key' => 'd3b2e689917f85a3c753245976ea8efd'
        ])->get('https://api.rajaongkir.com/starter/city');


        $ongkir = $response->json();

        return view('livewire.client.product.checkout')->with([
            'countries' => Province::all(),
            'ongkir' => $ongkir
        ])->extends('layouts.client')->section('content');
    }


    public function updated($saveOrder)
    {
        $this->validateOnly($saveOrder, [
            'name' => 'min:6|required|string',
            'email' => 'required|email',
            'address' => 'required',
            'notelp' => 'required|numeric',
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

    public function updatedCourier()
    {
        $this->service = true;
    }


    public function saveOrder()
    {
        // $data = $this->validate([
        //     'name' => 'min:4|required|string',
        //     'email' => 'required|email',
        //     'address' => 'required',
        //     'notes' => 'required',
        //     'notelp' => 'required|numeric',
        //     'selectedCountry' => 'required',
        //     'selectedDistrict' => 'required',
        //     'selectedCity' => 'required',
        //     'selectedVillage' => 'required'
        // ]);

        $url = 'https://api.rajaongkir.com/starter/cost';
        $key = 'd3b2e689917f85a3c753245976ea8efd';

        $response = Http::withHeaders([
            'key' => $key
        ])->post($url, [
            'origin' => $this->origin,
            'destination' => $this->destination,
            'weight' => $this->getWeight(),
            'courier' => $this->courier
        ]);

        dd($response->json());


        try {
            $customer = Customer::where('email', $this->email)->first();

            if (!Auth::check() && $customer) {
                $this->alert('info', 'If you want to checkout, please login first', [
                    'position' =>  'top-end',
                    'timer' =>  5000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);

                $this->redirectToLogin();
            } else {
                $this->alert('info', 'Email not found', [
                    'position' =>  'top-end',
                    'timer' =>  5000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    public function redirectToLogin()
    {
        $this->toLogin = true;
    }

    public function generateInvoice()
    {
        $no = Order::max('id');
        $id = sprintf("%04s", abs($no + 1));
        return "INV" . "-" . $id;
    }

    public function getWeight()
    {
        $cart = CartBlanja::content();
        $data = null;

        foreach ($cart as $key => $value) {
            $data[] = $cart[$key]->weight;
        }


        return array_sum($data);


    }
}
