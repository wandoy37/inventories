<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard.index');
Route::get('/pengguna', \App\Livewire\Pengguna\Index::class)->name('pengguna.index');
Route::get('/pengguna/{user}', \App\Livewire\Pengguna\Show::class)->name('pengguna.show');

// Bank Account
Route::get('/bank-account', \App\Livewire\Bankaccount\BankAccountIndex::class)->name('bank-account.index');
Route::get('/bank-account/create', \App\Livewire\Bankaccount\BankAccountCreate::class)->name('bank-account.create');
Route::get('/bank-account/{bankAccount}', \App\Livewire\Bankaccount\BankAccountEdit::class)->name('bank-account.edit');
