<?php

namespace App\Livewire;

use App\Jobs\GerarTicket;
use App\Models\Client;
use App\Models\Event;
use App\Models\Sale;
use App\Models\Sector;
use App\Models\Ticket;
use App\OpenAndClose;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SectorSaller extends Component
{


    public $eventItem;
    public $sectors;
    public $sectorItem;
    public $selectClient;
    public $ArrayTicket;
    public $ticketsGerados;

    public $RegisterClienteLive = true;

    

    public $name;
    public $lastname;
    public $email;
    public $cpf;
    public $clients;


    public $ticketQuantity;

  
    public $RegisterCLiete1 = true;

  
  
    public $modalGerarTicket = false;
    public $modalTicketsGerados = false;
    public $modalShowTicket = false;

    use OpenAndClose;

    public function FuncshowModalCLient(){

        $this->showModalCLient = true;


    }

    public function clientCall(){
        $this->clients = Client::all();
    }


    public function closeModalRegister(){
        $this->showModalCLient = false;
    }

    public function registerCLient(){

        $this->cpf = preg_replace('/\D/', '', $this->cpf);

        $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('clients')
            ],
             'cpf' => [
                'required',
                Rule::unique('clients')
             ],
        ]);


        Client::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'cpf' => $this->cpf,
        ]);





        $this->clients = Client::all();
        $this->closeModalRegister();


    }
  
     public function mount($id){

        $this->eventItem = Event::find($id);
        $this->sectors = Sector::where('event_id', $id)->get();

        $this->RegisterClienteLive = true;
      
    }

    public function showReserva($id){

        $this->clientCall();

        $this->ticketStatsu = true;

        $this->sectorItem = Sector::find($id);
        $this->openModal();
    }

    public function FuncshowCliente(){
        $this->clientCall();

        $this->validate([
            'ticketQuantity' => 'required|gt:0|numeric'
        ]);
       $this->ticketStatsu = false;
       $this->showCliente = true;
    }

    public function gerarTicket($ticket){
        GerarTicket::dispatch($ticket);
    
        $this->ArrayTicket->push($ticket);
    }

    

    public function BtnFN(){

        $this->RegisterClienteLive= false;

        if(empty($this->selectClient)){
            session()->flash('ErrorForm', 'Selecione o cliente');
            return false;
        }

        if($this->ticketQuantity > $this->eventItem->limit_ticket or Ticket::where('client_id', $this->selectClient)->count() > $this->eventItem->limit_ticket){
             session()->flash('ErrorForm', 'Atingiu o limite de ingressos por cliente');
             return false;
        }

        if($this->ticketQuantity > $this->eventItem->capacity_ticket){
            session()->flash('ErrorForm', 'Atingiu a capacidade do evento');
            return false;
        }

        if($this->ticketQuantity > $this->sectorItem->capacity_ticket){
            session()->flash('ErrorForm', 'Atingiu a capacidade do setor');
            return false;
        }

        $this->closeModal();
        $this->modalGerarTicket = true;
      

        $sale = Sale::create([
            'user_id' => 1
        ]);

        for ($i=1; $i < ($this->ticketQuantity +1) ; $i++) {    

            $code = str()->upper(str()->random(12));

            $sectorId = $this->sectorItem->id;

            $ticket = Ticket::create([
                'code_ticket' => $code,
                'status_ticket' => 'Emitido',
                'client_id' => $this->selectClient,
                'sector_id' => $sectorId,
                'sale_id' => $sale->id,
                'time_validation' => "{$this->eventItem->date_event} 00:00",
            ]);


            $this->gerarTicket($ticket);
        }

        $this->eventItem->update([
            'capacity_ticket' => $this->eventItem->capacity_ticket - $this->ticketQuantity
        ]);

        $this->sectorItem->update([
            'ticket_reserved' => $this->sectorItem->ticket_reserved + $this->ticketQuantity
        ]);


    }


    public function verificarTicketGerado(){

        foreach ($this->ArrayTicket as $key => $value) {
            
            $ticketname = "tickets/Ingresso{$value->id}.png";
            if(file_exists(storage_path("app/public/{$ticketname}"))){
                $this->ArrayTicket->pull($key);
            }
        }

        if($this->ArrayTicket->isEmpty()){
               $this->modalGerarTicket = false;
               $this->modalShowTicket = true;

             
               $this->ticketsGerados = Ticket::orderBy('id', 'DESC')->limit($this->ticketQuantity)->get();
        }
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





    public function fnTotal(){
        

        $this->modalGerarTicket = false;
        session()->flash('Sucess', 'Reserva realizada com sucesso');
        $this->redirectRoute('saller.sector', $this->eventItem->id);

    }


    public function render()
    {

        if(!$this->ArrayTicket){
            $this->ArrayTicket = collect();
        }


        return view('livewire.sector-saller')
           ->layout('layout.app');
    }
}
