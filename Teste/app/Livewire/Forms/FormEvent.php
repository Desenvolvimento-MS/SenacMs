<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormEvent extends Form
{
    public $name;
    public $capacity_ticket;
    public $date_event;
    public $time_event;
    public $endereco_event;
    public $img_event;
    public $limit_ticket;

    public ?Event $model = null;
    


  protected function rules()
    {
        return [
            'name' => 'required',
            'capacity_ticket' => 'numeric|required|gt:1',
            'date_event' => 'required|after:today',
            'time_event' => 'required',
            'endereco_event' => 'required',
            'limit_ticket' => 'required',
        ];
    }


    public function store(){

        $this->validate();

        $event = Event::create([
           'name'=> $this->name,
           'capacity_ticket'=> $this->capacity_ticket,
           'time_event'=> $this->time_event,
           'endereco_event'=> $this->endereco_event,
           'date_event'=> $this->date_event,
           'img_event'=> $this->img_event,
           'limit_ticket'=> $this->limit_ticket,
        ]);

        return $event;

    }

    public function update(){

        $this->validate();

        $this->model->update([
          'name'=> $this->name,
           'capacity_ticket'=> $this->capacity_ticket,
           'time_event'=> $this->time_event,
           'endereco_event'=> $this->endereco_event,
           'date_event'=> $this->date_event,
           'img_event'=> $this->img_event,
           'limit_ticket'=> $this->limit_ticket,
        ]);

    }


    public function setModel($model){

        $this->model = $model;

        $this->name = $model->name;
        $this->capacity_ticket = $model->capacity_ticket;
        $this->date_event = $model->date_event;
        $this->time_event = $model->time_event;
        $this->endereco_event = $model->img_event;
        $this->img_event = $model->endereco_event;
        $this->limit_ticket = $model->limit_ticket;

    }

}
