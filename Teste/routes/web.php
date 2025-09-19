<?php

use App\Livewire\Event;
use App\Livewire\Sector;
use App\Livewire\Teste;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;

Route::get('/', User::class);



Route::get('/eventos', Event::class)->name('events');
Route::get('/usuários', User::class)->name('users');

Route::get('/eventos/setor/{id}', Sector::class)->name('event.saller');



