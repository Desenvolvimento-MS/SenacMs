<?php

namespace App;

trait OpenAndClose
{
    


    public $showModal = false;
    public $updateFom = false;
    public $search;

      public $showModalCLient = false;
      public $ticketStatsu = false;
        public $showCliente = false;

 
    


    public function closeModal(){

        $this->resetValidation();

        $this->reset([
            'showModal',
            'updateFom',
            'search',
            'showModalCLient',
            'ticketStatsu',
            'showCliente',
        ]);
    }

    public function openModal(){

        $this->showModal = true;
    }

}
