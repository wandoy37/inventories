<?php

namespace App\Livewire\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class VendorEdit extends Component
{
    public ?Vendor $vendor;

    public $name = '';
    public $address = '';
    public $email = '';
    public $phone = '';

    public function mount()
    {
        $this->name = $this->vendor->name;
        $this->address = $this->vendor->address;
        $this->email = $this->vendor->email;
        $this->phone = $this->vendor->phone;
    }

    public function render()
    {
        return view('livewire.vendor.vendor-edit')->title('Edit Vendor - ' . $this->vendor->name);
    }

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'min:1',
                Rule::unique('vendors')->ignore($this->vendor),
            ],
            'address' => 'required|min:1',
            'email' => 'required|min:1',
            'phone' => 'required|min:1',
        ];
    }

    public function update()
    {
        try {
            $this->validate();
            // Update data
            $this->vendor->update($this->all());
            session()->flash('success', 'Data Vneodr ' . $this->vendor->name . ' berhasil diupdate');
            return $this->redirectRoute('daftar-vendor.edit', $this->vendor->id);
        } catch (ValidationException $e) {
            // Tambahkan flash message jika gagal
            session()->flash('errors', 'Data Vneodr ' . $this->vendor->name . ' gagal diupdate');
            throw $e; // tetap lempar error supaya pesan validasi ditampilkan
        }
    }
}
