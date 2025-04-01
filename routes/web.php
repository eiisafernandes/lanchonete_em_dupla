<?php

use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Cadastro\Create;
use Illuminate\Support\Facades\Route;

Route::get('login', Login::class);

Route::get('cadastro/cliente', Create::class)->name('cliente.cadastro');