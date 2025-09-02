<?php

namespace App\Livewire\Bankaccount;

use App\Models\BankAccount;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;

class BankAccountCreate extends Component
{
    #[Title('Buat Akun Bank')]

    public $account_number = '';
    public $account_name = '';

    public function save()
    {
        try {
            // Validate
            $validated = $this->validate([
                'account_number' => 'required|min:3|unique:bank_accounts',
                'account_name' => 'required|min:3',
            ]);

            // Simpan data
            BankAccount::create([
                'account_number' => $this->account_number,
                'account_name' => $this->account_name
            ]);

            session()->flash('success', 'Akun Bank berhasil ditambahkan');
            return $this->redirectRoute('bank-account.index');
        } catch (ValidationException $e) {
            // Tambahkan flash message jika gagal
            session()->flash('errors', 'Validasi gagal! Periksa kembali input Anda.');
            throw $e; // tetap lempar error supaya pesan validasi ditampilkan
        }
    }

    public function render()
    {
        return view('livewire.bankaccount.create');
    }
}
