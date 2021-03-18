<?php

namespace App\Http\Livewire\Client\Components;

use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class Dropdowns extends Component
{

    public $selectedCountry = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;

    public $cities = null;
    public $district = null;
    public $village = null;



    public function render()
    {

        return view('livewire.client.components.dropdowns')->with([
            'countries' => Province::all()
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
}
