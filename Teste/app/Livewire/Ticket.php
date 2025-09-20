<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Sector;
use App\Models\Ticket as ModelsTicket;
use App\OpenAndClose;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Ticket extends Component
{



    use OpenAndClose;


    public $totalEvent = 0;
    public $totalValidado = 0;
    public $totalNãoValidado = 0;
    public $eventItem;
    public $idEvent;
    public $events;
    public $selectTicket;
    public $typeSelectTicket;
    public $tickets = [];


    public function delete($id){

        $model = ModelsTicket::find($id);



        $sector = Sector::find($model->sector_id);
        
        $sector->update([
            'ticket_reserved' => $sector->ticket_reserved - 1
        ]);

        $this->eventItem->update([
            'capacity_ticket' => $this->eventItem->capacity_ticket + 1
        ]);

        $model->delete();

        session()->flash('Sucess', 'Deletado com sucesso');
        $this->redirectRoute('tickets');

    }

    public function selectEvent(){

        $this->eventItem = Event::find($this->idEvent);

        $setores = $this->eventItem->sector()->pluck('id');

        $this->tickets = ModelsTicket::with(['client','sector'])->whereIn('sector_id', $setores)->get();

        $this->totalEvent = $this->eventItem->capacity_ticket;
            

        $query = ModelsTicket::with(['client','sector'])->whereIn('sector_id', $setores);

        $this->totalValidado = $query->where('status_ticket', 'Validado')->count();


        $this->totalValidado = $query->where('status_ticket', 'Emitido')->count();


    }
    
    public function mount(){

        $this->events = Event::all();
    }



    public $openVisuModal = false;
    public $visuTicket;

    public function verTiciket($id){

        $path = "tickets/Ingresso{$id}.png";
        $this->visuTicket = Storage::url($path);

        $this->openVisuModal = true;
    }

    public function closeVisuModal(){
        $this->openVisuModal = false;
    }



    public function render()
    {


        if($this->eventItem){

            $setores = $this->eventItem->sector()->pluck('id');
            
            $query = ModelsTicket::with(['client','sector'])->whereIn('sector_id', $setores);
            
            if($this->search){

                $query->whereHas('client', function($q){
                      $q->where('name', 'like', "%{$this->search}%")->orWhere('lastname', 'like', "%{$this->search}%");
                });

            }

            if($this->typeSelectTicket){

                if($this->typeSelectTicket != 'todos'){

                    $query->where('status_ticket', $this->typeSelectTicket);
                }
            }
            $this->tickets = $query->get();


        }


        return view('livewire.ticket')
        ->layout('layout.app');
    }
}
