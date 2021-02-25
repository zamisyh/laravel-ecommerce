<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.auth.logout')->extends('layouts.app')->section('content');
    }



    public function logout()
    {
        Auth::logout();
        session()->flash('logout', '');


    }


}
