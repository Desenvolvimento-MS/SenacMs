<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{



    public $inputLogin;
    public $password;


    public function login(){

        $filed = filter_var($this->inputLogin, FILTER_VALIDATE_EMAIL) ? 'email' : 'cpf';



        $this->validate([
            'inputLogin' => 'required',
            'password' => 'required',
        ]);



        $credetials = [
            $filed => $this->inputLogin,
            'password' => $this->password,
        ];



        if(Auth::attempt($credetials)){

            session()->regenerate();

            $user = Auth::user();
            switch ($user->profile) {
                case 'Adm':
                    $this->redirectRoute('events');
                    break;
                case 'Saller':
                      $this->redirectRoute('saller');
                    break;
                case 'Check':
                     $this->redirectRoute('check');
                    break;
            }


        }else{

            session()->flash('ErroLogin', 'O Emial/CPF ou a senha estão incorretos');
            return false;
        }


    }
    public function render()
    {
        return view('livewire.login')
           ->layout('layout.login');
    }
}
