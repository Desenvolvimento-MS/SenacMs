<?php

namespace App\Jobs;

use App\Models\Client;
use App\Models\Event;
use App\Models\Sector;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Browsershot\Browsershot;

class GerarTicket implements ShouldQueue
{
    use Queueable;


    public $ticket;

    /**
     * Create a new job instance.
     */
    public function __construct($ticket)
    {
        

        $ticket = $ticket;
        $sector = Sector::find($ticket->sector_id);
        $event = Event::find($sector->event_id);
        $client = Client::find($ticket->client_id);


        $html = view('TicketPaste.ticket', [
            'ticket' => $ticket,
            'sector' => $sector,
            'event' => $event,
            'client' => $client,
        ])->render();


        if(!file_exists(storage_path('app/public/tickets'))){
            mkdir(storage_path('app/public/tickets'), 0755, true);
        }

        $ticketName = "tickets/Ingresso{$ticket->id}.pdf";

        $path = storage_path("app/public/{$ticketName}");

        Browsershot::html($html)
            ->timeout(60)
            ->windowSize(440,700)
            ->save($path);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
