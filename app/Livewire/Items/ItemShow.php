<?php

namespace App\Livewire\Items;

use Livewire\Component;
use App\Models\Item;
use App\Models\ItemUnitType;
use Illuminate\Validation\ValidationException;

class ItemShow extends Component
{
    protected $listeners = ['unit-saved' => 'reloadUnits'];
    public ?Item $item;
    public array $units = [];

    public $code = '';
    public $name = '';
    public $description = '';

    public $nameUnit, $quantityUnit, $price_buyUnit, $price_sellUnit;

    public function mount(Item $item)
    {
        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->description = $this->item->description;

        $this->item = $item->load('units');
        // Simpan ke array agar bisa di-wire:model per unit
        $this->units = $this->item->units
            ->keyBy('id')
            ->map(fn ($u) => [
                'name' => $u->name,
                'quantitiy' => $u->quantitiy,
                'price_buy' => $u->price_buy,
                'price_sell' => $u->price_sell
                ])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.items.item-show')->title('Data Barang - ' . $this->item->name . ' (' . $this->item->code . ')');
    }

    private function deformat($v)
    {
        if ($v === null || $v === '') return null;
        $d = preg_replace('/\D/', '', (string) $v); // buang Rp, titik, spasi, dll
        return $d === '' ? null : (int) $d;
    }

    public function saveUnit()
    {
        try {
            // Validate
            $validated = $this->validate([
                'nameUnit'       => ['required','string'],
                'quantityUnit'   => ['required','min:1'],
                'price_buyUnit'  => ['required'],
                'price_sellUnit' => ['required'],
            ]);

            // clear format rupiah
            $this->price_buyUnit  = $this->deformat($this->price_buyUnit);
            $this->price_sellUnit = $this->deformat($this->price_sellUnit);
                
            ItemUnitType::create([
                'item_id' => $this->item->id,
                'name'       => $this->nameUnit,
                'quantitiy'   => $this->quantityUnit,
                'price_buy'  => $this->price_buyUnit,
                'price_sell' => $this->price_sellUnit,
            ]);

            $this->item->refresh()->load('units');

            $this->reset(['nameUnit','quantityUnit','price_buyUnit','price_sellUnit']);
            $this->resetValidation();
            $this->dispatch('unit-saved');
            return redirect()
            ->route('daftar-barang.show', $this->item->id)
            ->with('success', 'Stock Awal berhasil ditambahkan');
        } catch (ValidationException $e) {
            session()->flash('errors', 'Tambah Stock Awal gagal! Periksa kembali input Anda.');
            throw $e;
        }
    }
}
