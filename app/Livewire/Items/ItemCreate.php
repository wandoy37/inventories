<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

use Livewire\Component;

class ItemCreate extends Component
{
    #[Title('Tambah Data Barang')]

    public $code = '';
    public $name = '';
    public $description = '';


    public function render()
    {
        return view('livewire.items.item-create');
    }

    // Generate Kode Barang
    public function updatedName($value)
    {
        $random = Str::upper(Str::random(5));
        // Prediksi id berikutnya
        $nextId = (\App\Models\Item::max('id') ?? 0) + 1;
        $this->code = $random . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        try {
            // Validate
            $validated = $this->validate([
                'name' => 'required|min:1|unique:items',
                'description' => 'required|min:1',
            ]);

            // Simpan data
            $item = Item::create([
                'code' => $this->code,
                'name' => $this->name,
                'description' => $this->description
            ]);

            session()->flash('success', 'Data barang berhasil ditambahkan');
            return $this->redirectRoute('daftar-barang.show', $item, navigate: true);
        } catch (ValidationException $e) {
            // Tambahkan flash message jika gagal
            session()->flash('errors', 'Validasi gagal! Periksa kembali input Anda.');
            throw $e; // tetap lempar error supaya pesan validasi ditampilkan
        }
    }
}
