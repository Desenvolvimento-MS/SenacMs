<?php

namespace App;

trait OpenAndClose
{
    


    public $showModal = false;
    public $updateFom = false;
    public $search;


    public function closeModal(){

        $this->resetValidation();

        $this->reset([
            'showModal',
            'updateFom',
            'ticketStatsu',
            'search',
            'showCliente',
            'RegisterCLietShow',
        ]);
    }

    public function openModal(){

        $this->showModal = true;
    }

}
