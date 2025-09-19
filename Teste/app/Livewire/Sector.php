<?php

namespace App\Livewire;

use App\Livewire\Forms\FormSector;
use App\Models\Event;
use App\Models\Sector as ModelsSector;
use App\OpenAndClose;
use Livewire\Component;

class Sector extends Component
{

    public $sectors;
    public $eventItem;
    public $sectorItem;
    public $ticketRestante;

       public FormSector $form;

    use OpenAndClose;

    public function mount($id){

        $this->eventItem = Event::find($id);


        $this->sectors = ModelsSector::where('event_id', $id)->get();
        $this->calcularQuntTicket();


    }


    public function calcularQuntTicket(){

        $capacidadeEvento = $this->eventItem->capacity_ticket;

        $somaSetores = $this->eventItem->sector->sum('capacity_ticket');
        $somaIngresso = $this->eventItem->sector->sum('ticket_reserved');

        $this->ticketRestante = $capacidadeEvento - $somaSetores + $somaIngresso;

    }



    public function typeForm($id=null, $type=null){

        $this->openModal();
        
        if($type == 'update'){
            $this->updateFom =true;
            $this->sectorItem = ModelsSector::find($id);
            $this->form->setModel(ModelsSector::find($id));
        }else{
            $this->form->reset();
        }
    }



    public function verificarTicket(){

        $capacidadeEvento = $this->eventItem->capacity_ticket;


        $somaSetors = $this->eventItem->sector->where('id', '!=', $this->sectorItem->id)->sum('capacity_ticket');


        $totalValues = $capacidadeEvento + $somaSetors;


        if($totalValues > $capacidadeEvento){
            return false;
        }

        $this->calcularQuntTicket();
        return true;
    }

    
    public function register(){


        $somasetores = $this->eventItem->sector->sum('capacity_ticket');


     

        if($somasetores >= $this->eventItem->capacity_ticket){



             session()->flash('ErrorFormQuan', 'Capacidade máxima de ingressos do evento alcançada');
            return false;
        }



        $this->form->event_id= $this->eventItem->id;
        $this->form->ticket_reserved = 0;

        $event = $this->form->store();

        session()->flash('Sucess', 'Cadastrado com sucesso');
        $this->redirectRoute('event.saller',$this->eventItem->id);
    }


    public function update(){


        
        $this->form->event_id= $this->eventItem->id;
        $this->verificarTicket();

        $this->form->update();

        session()->flash('Sucess', 'Editado com sucesso');
        $this->redirectRoute('event.saller',$this->eventItem->id);
    }


    public function delete($id){

          $model = ModelsSector::find($id);
            $model->delete();
        
            session()->flash('Sucess', 'Deletado com sucesso');
              $this->redirectRoute('event.saller',$this->eventItem->id);
    }



    public function render()
    {
        return view('livewire.sector')
           ->layout('layout.app');
    }
}
