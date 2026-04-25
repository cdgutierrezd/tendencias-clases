<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\TipoUsuariosController;
use App\Http\Controllers\UsuariosController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Route::get('/about', function () {
    return 'acerca de nosotros';
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('clientes', ClientesController::class);
    Route::resource('tickets', TicketsController::class);
    Route::resource('comentarios', ComentariosController::class);
    Route::resource('tipousuarios', TipoUsuariosController::class);
    Route::resource('usuarios', UsuariosController::class);
});

Auth::routes();