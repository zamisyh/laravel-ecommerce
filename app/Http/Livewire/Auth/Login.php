<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Alert;

class Login extends Component
{

    public $email, $password, $loginSuccess;

    public function render()
    {
        session()->has('successLogin') ? $this->alertSuccessLogin() : null;
        return view('livewire.auth.login')->extends('layouts.auth')->section('content');

    }

    public function alertSuccessLogin()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Sucessfully login',
            'text' => 'Redirecting....'
        ]);
    }


    public function login()
    {
        $this->validate([
            'email' => 'email|required|exists:users,email',
            'password' => 'required'
        ]);

        try {

            if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){

                session()->flash('successLogin', 'Login successfully');

                $this->resetErrorBag();
                $this->resetValidation();
                $this->resetFields();
            }else{
                session()->flash('errLog', 'Invalid Data!');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
