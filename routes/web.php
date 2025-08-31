<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard.index');
Route::get('/pengguna', \App\Livewire\Pengguna\Index::class)->name('pengguna.index');
Route::get('/pengguna/{user}', \App\Livewire\Pengguna\Show::class)->name('pengguna.show');
