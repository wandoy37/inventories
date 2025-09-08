<?php

namespace App\Livewire\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Data Vendor')]

class VendorIndex extends Component
{
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
        $vendors = Vendor::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);
        // End Query Search

        return view('livewire.vendor.vendor-index', [
            'vendors' => $vendors,
        ]);
    }

    public function delete($id)
    {
        $vendor = Vendor::findOrFail($id);
        foreach ($vendor->rekenings as $rekening) {
            $rekening->delete();
        }
        $vendor->delete();
        session()->flash('warning', 'Data Vendor ' . $vendor->name . ' berhasil dihapus');
        return $this->redirectRoute('daftar-vendor.index');
    }
}
