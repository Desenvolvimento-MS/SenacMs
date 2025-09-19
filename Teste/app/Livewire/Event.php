<?php

namespace App\Livewire;

use App\Livewire\Forms\FormEvent;
use App\Models\Event as ModelsEvent;
use App\Models\Sector;
use App\Models\Ticket;
use App\OpenAndClose;
use Livewire\Component;
use Livewire\WithFileUploads;

class Event extends Component
{
    
    use OpenAndClose;

    use WithFileUploads;


    public $TotalEvent;
    public $events;

    public $eventItem;

    public FormEvent $form;



    public function mount(){

        $this->events = ModelsEvent::all();
    }

    public function typeForm($id=null, $type=null){

        $this->openModal();
        
        if($type == 'update'){
            $this->updateFom =true;
            $this->eventItem = ModelsEvent::find($id);
            $this->form->setModel(ModelsEvent::find($id));
        }else{
            $this->form->reset();
        }
    }


    public function register(){


        if(!file_exists(storage_path('app/public/image'))){
            mkdir(storage_path('app/public/image'), 0755,true);
        }


        if($this->form->img_event){
            $path = $this->form->img_event->store('image', 'public');

            $this->form->img_event = $path;
        }else{

           $this->form->img_event = 'image/Ativo 5.png';
        }

    

        $event = $this->form->store();


        $arryaSatus = ['VIP','IMP','COM'];

        foreach ($arryaSatus as $key => $value) {

            Sector::create([
                'name' => "Setor{$value}",
                'capacity_ticket' => 0,
                'ticket_reserved' =>0,
                'type_sector' => $value,
                'event_id' => $event->id,
            ]);
        }

        session()->flash('Sucess', 'Cadastrado com sucesso');
        $this->redirectRoute('events');
    }

    public function update(){

        $this->form->update();

        session()->flash('Sucess', 'Editado com sucesso');
        $this->redirectRoute('events');
    }


    public function delete($id){

        $model = ModelsEvent::find($id);
        

        // $setors = $this->eventItem->sector()->pluck('id');


        // if(Ticket::whereIn('sector_id', $setors)->count() >= 1){
        //      session()->flash('Error', 'Não é possivel deletar esse evento pois ele já possui uma venda');
        //     return false;
        // }

        $model->delete();
        
        session()->flash('Sucess', 'Deletado com sucesso');
        $this->redirectRoute('events');
    }





    
    public function render()
    {

         $model = ModelsEvent::all();
        $this->TotalEvent = $model->count();
       
        $query = ModelsEvent::query();
        if($this->search){

            $query->whereAny([
                'name',
                'capacity_ticket',
                'date_event',
                'time_event',
            ], 'like', "%{$this->search}%");
        }

        $this->events = $query->get();


        return view('livewire.event')
          ->layout('layout.app');
    }
}
