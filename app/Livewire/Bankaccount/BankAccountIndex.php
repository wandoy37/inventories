<?php

namespace App\Livewire\Bankaccount;

use App\Models\BankAccount;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Akun Bank')]

class BankAccountIndex extends Component
{
    protected $listeners = ['deleteConfirmed' => 'delete'];

    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    #[Url]
    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Query Search
        $bankAccounts = BankAccount::query()
            ->when($this->search, function ($query) {
                $query->where('account_name', 'like', '%' . $this->search . '%')
                    ->orWhere('account_number', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);
        // End Query Search

        return view('livewire.bankaccount.index', [
            'bankAccounts' => $bankAccounts,
        ]);
    }

    public function delete($id)
    {
        $bankAccount = BankAccount::findOrFail($id);
        $bankAccount->delete();
        session()->flash('success', 'Akun Bank berhasil diupdate');
        return $this->redirectRoute('bank-account.index');
    }
}
