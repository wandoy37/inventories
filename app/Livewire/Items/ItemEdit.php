<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ItemEdit extends Component
{
    public ?Item $item;

    public $code = '';
    public $name  = '';
    public $description = '';

    public function mount()
    {
        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->description = $this->item->description;
    }

    public function render()
    {
        return view('livewire.items.item-edit')->title('Edit Data Barang - ' . $this->item->name);
    }

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'min:1',
                Rule::unique('items')->ignore($this->item),
            ],
            'description' => 'required|min:1',
        ];
    }

    public function update()
    {
        try {
            $this->validate();
            // Update data
            $this->item->update($this->all());
            session()->flash('success', 'Data Barang : ' . $this->item->name . ' berhasil diupdate');
            return $this->redirectRoute('daftar-barang.edit', $this->item->id);
        } catch (ValidationException $e) {
            // Tambahkan flash message jika gagal
            session()->flash('errors', 'Data Barang gagal diupdate');
            throw $e; // tetap lempar error supaya pesan validasi ditampilkan
        }
    }
}
