<?php

use App\Livewire\Check;
use App\Livewire\Dashboard;
use App\Livewire\Event;
use App\Livewire\EventSaller;
use App\Livewire\Login;
use App\Livewire\Sector;
use App\Livewire\SectorSaller;
use App\Livewire\Teste;
use App\Livewire\Ticket;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class);
Route::get('/login', Login::class)->name('login');



Route::middleware(['auth', 'role:Adm'])->group(function () {
    Route::get('/eventos', Event::class)->name('events');
    Route::get('/usuarios', User::class)->name('users');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/eventos/setor/{id}', Sector::class)->name('event.saller');

});

Route::middleware(['auth', 'role:Adm,Saller'])->group(function () {
    Route::get('/reserva', EventSaller::class)->name('saller');

    Route::get('/reserva/{id}', SectorSaller::class)->name('saller.sector');

    Route::get('/ingressos', Ticket::class)->name('tickets');

    Route::get('/donwload/{id}', function($id){
        $fullpaht = storage_path("app/public/tickets/Ingresso{$id}.png");

        if(file_exists($fullpaht)){
            return response()->download($fullpaht, "Ingresso{$id}.png");
        }

    })->name('donwload');


 
});


Route::middleware(['auth', 'role:Adm,Check'])->group(function () {
  
    Route::get('/validador', Check::class)->name('check');

 
});