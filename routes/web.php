<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/about', function () {
    return 'Acerca de nosotros';
}); 

Route::get('/user/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
}); 


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
