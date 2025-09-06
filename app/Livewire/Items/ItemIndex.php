<?php

namespace App\Livewire\Items;

use Livewire\Component;
use Livewire\Attributes\Title;
use \App\Models\Item;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class ItemIndex extends Component
{
    #[Title('Daftar Barang')]
    protected string $paginationTheme = 'bootstrap';
    
    
    #[Url]
    public string $search = '';
    
    use WithPagination;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Query Search
        $items = Item::query()
            ->when($this->search, function ($query) {
                $query->where('code', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);
        // End Query Search

        return view('livewire.items.item-index', [
            'items' => $items,
        ]);
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        session()->flash('warning', 'Data Barang telah di hapus');
        return $this->redirectRoute('daftar-barang.index');
    }
}
