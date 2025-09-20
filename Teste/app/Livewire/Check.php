<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class Check extends Component
{

    public $code;


    public function check(){

        strtoupper($this->code);
        $tickt = Ticket::where('code_ticket', $this->code)->first();


        if($tickt){


            if($tickt->status_ticket == 'Validado'){
                session()->flash('Error', 'Este ingresso já foi válidado');
                $this->reset([
                    'code'
                ]);
                return false;
            }



            $tickt->update([
                'status_ticket' => 'Validado',
            ]);

            session()->flash('Sucess', "O ingresso {$tickt->id}° foi válidado com sucesso");

        }else{

    

            session()->flash('ErroLogin', 'Digite um código válido');

            $this->reset([
                'code'
            ]);
            return false;

        }



    }
    public function render()
    {
        return view('livewire.check')
           ->layout('layout.login');
    }
}
