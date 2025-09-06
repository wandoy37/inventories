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

// Daftar Barang
Route::get('/daftar-barang', \App\Livewire\Items\ItemIndex::class)->name('daftar-barang.index');
Route::get('/daftar-barang/create', \App\Livewire\Items\ItemCreate::class)->name('daftar-barang.create');
Route::get('/daftar-barang/{item}', \App\Livewire\Items\ItemShow::class)->name('daftar-barang.show');
Route::get('/daftar-barang/edit/{item}', \App\Livewire\Items\ItemEdit::class)->name('daftar-barang.edit');


