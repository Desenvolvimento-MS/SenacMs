<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logunt extends Component
{


    public function loogunt(){

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        $this->redirectRoute('login');
    }


    
    public function render()
    {
        return view('livewire.logunt');
    }
}
