<?php

use App\Livewire\Teste;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;

Route::get('/', User::class)->name('users');



