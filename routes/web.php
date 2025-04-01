<?php

use App\Livewire\Admin\Dashboard\Inicio;
use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Cadastro\Create;
use Illuminate\Support\Facades\Route;

Route::get('login', Login::class);

Route::get('cadastro/cliente', Create::class)->name('cliente.cadastro');

Route::get('pagina/inicial/admin', Inicio::class)->middleware('auth', 'role:admin')->name('admin.dashboard');

