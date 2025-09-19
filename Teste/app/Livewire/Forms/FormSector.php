<?php

namespace App\Livewire\Forms;

use App\Models\Sector;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormSector extends Form
{
    public $name;
    public $capacity_ticket;
    public $ticket_reserved;
    public $type_sector;
    public $event_id;

    public ?Sector $model = null;
    


  protected function rules()
    {
        return [
            'name' => 'required',
            'capacity_ticket' => 'numeric|required|gt:1',
            'type_sector' => 'required',
        ];
    }


    public function store(){

        $this->validate();

        Sector::create([
           'name'=> $this->name,
           'capacity_ticket'=> $this->capacity_ticket,
           'ticket_reserved'=> $this->ticket_reserved,
           'type_sector'=> $this->type_sector,
           'event_id'=> $this->event_id,
        ]);

    }

    public function update(){

        $this->validate();

        $this->model->update([
          'name'=> $this->name,
           'capacity_ticket'=> $this->capacity_ticket,
           'ticket_reserved'=> $this->ticket_reserved,
           'type_sector'=> $this->type_sector,
           'event_id'=> $this->event_id,
        ]);

    }


    public function setModel($model){

        $this->model = $model;

        $this->name = $model->name;
        $this->capacity_ticket = $model->capacity_ticket;
        $this->ticket_reserved = $model->ticket_reserved;
        $this->type_sector = $model->type_sector;
        $this->event_id = $model->img_event;
       

    }
}
