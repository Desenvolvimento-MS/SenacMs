<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Sector;
use App\Models\Ticket;
use App\OpenAndClose;
use Livewire\Component;

class Dashboard extends Component
{

    public $eventItem;
    public $events;
    public $tickets;
    public $totalValidado = 0;
    public $totalNãoValidado = 0;
    public $totalEvent = 0;
    public $selectEvent;
    public $setoresEsgotados;
    public $setores;
    public $eventSector;
    public $sectorLabel;
    public $sectorValue;
    public $ArryTitcketDados = [];

     use OpenAndClose;


  
    public function mount(){

        $this->events = Event::all();
        $this->selectEvent = Event::value('id');
    }

    



    public function render()
    {



        if($this->selectEvent){

              $this->eventItem = Event::find($this->selectEvent);

              $this->eventSector = $this->eventItem->sector;

              $this->sectorLabel = $this->eventSector->pluck('name');
              
              $this->sectorValue = $this->eventSector->pluck('ticket_reserved');
              


              $this->setoresEsgotados = Sector::where('event_id', $this->eventItem->id)->whereColumn(
                'capacity_ticket', '=', 'ticket_reserved'
              )->get();

              


              $this->setores = Sector::where('event_id', $this->eventItem->id)->get();
        }

        if($this->eventItem){





            $setores = $this->eventItem->sector()->pluck('id');
            $this->tickets = Ticket::with(['client','sector'])->whereIn('sector_id', $setores)->get();

            $setores = $this->eventItem->sector()->pluck('id');
            $this->totalEvent = $this->eventItem->capacity_ticket;
            

            $query = Ticket::with(['client','sector'])->whereIn('sector_id', $setores);


            $teste = $query->count();
            $calc = $teste - 1;

            $this->totalValidado = $query->where('status_ticket', 'Validado')->count() ;

            $this->totalNãoValidado = $calc;

            $this->ArryTitcketDados[]= $this->totalValidado;
            $this->ArryTitcketDados[]= $this->totalNãoValidado;

        }
        return view('livewire.dashboard')
              ->layout('layout.app');
    }
}
