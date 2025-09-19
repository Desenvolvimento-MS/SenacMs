<?php

namespace App\Livewire;

use App\Models\Event;
use App\OpenAndClose;
use Livewire\Component;

class EventSaller extends Component
{

    public $events;

    use OpenAndClose;
    public function mount(){

        $this->events = Event::all();

    }
    public function render()
    {

        $query = Event::query();
        if($this->search){

            $query->whereAny([
                'name',
                'capacity_ticket',
                'date_event',
                'time_event',
            ], 'like', "%{$this->search}%");
        }

        $this->events = $query->get();


        return view('livewire.event-saller')
           ->layout('layout.app');

    }
}
