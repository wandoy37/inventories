<?php

namespace App\Livewire\Bankaccount;

use Livewire\Component;
use App\Models\BankAccount;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class BankAccountEdit extends Component
{
    public ?BankAccount $bankAccount;

    public $account_number = '';
    public $account_name = '';

    public function mount()
    {
        $this->account_number = $this->bankAccount->account_number;
        $this->account_name = $this->bankAccount->account_name;
    }

    protected function rules()
    {
        return [
            'account_number' => [
                'required',
                'min:3',
                Rule::unique('bank_accounts')->ignore($this->bankAccount),
            ],
            'account_name' => 'required|min:3',
        ];
    }

    public function update()
    {
        try {
            $this->validate();
            // Update data
            $this->bankAccount->update($this->all());
            session()->flash('success', 'Akun Bank berhasil diupdate');
            return $this->redirectRoute('bank-account.edit', $this->bankAccount->id);
        } catch (ValidationException $e) {
            // Tambahkan flash message jika gagal
            session()->flash('errors', 'Akun Bank gagal diupdate');
            throw $e; // tetap lempar error supaya pesan validasi ditampilkan
        }
    }

    public function render()
    {
        return view('livewire.bankaccount.edit')
            ->title('Edit Akun Bank - ' . $this->bankAccount->account_name . ' (' . $this->bankAccount->account_number . ')');
    }
}
