<?php

use App\Livewire\Event;
use App\Livewire\EventSaller;
use App\Livewire\Sector;
use App\Livewire\SectorSaller;
use App\Livewire\Teste;
use App\Livewire\Ticket;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;

Route::get('/', User::class);



Route::get('/eventos', Event::class)->name('events');
Route::get('/usuários', User::class)->name('users');

Route::get('/reserva', EventSaller::class)->name('saller');

Route::get('/reserva/{id}', SectorSaller::class)->name('saller.sector');


Route::get('/eventos/setor/{id}', Sector::class)->name('event.saller');

Route::get('/ingressos', Ticket::class)->name('ticket');




Route::get('/ticket', function(){
    return view('TicketPaste.ticket');
});