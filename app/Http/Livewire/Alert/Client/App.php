<?php

namespace App\Http\Livewire\Alert\Client;

use Livewire\Component;

class App extends Component
{
    public function render()
    {
        return view('livewire.alert.client.app')->extends('layouts.client');
    }

    public function alertSuccessLogin()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Sucessfully login',
            'text' => 'Redirecting....'
        ]);
    }

}
