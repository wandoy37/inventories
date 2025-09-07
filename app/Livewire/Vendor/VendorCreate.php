<?php

namespace App\Livewire\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;

#[Title('Tambah Data Vendor')]

class VendorCreate extends Component
{
    public $name = '';
    public $address = '';
    public $email = '';
    public $phone = '';

    public function render()
    {
        return view('livewire.vendor.vendor-create');
    }

    public function save()
    {
        try {
            // Validate
            $validated = $this->validate([
                'name' => 'required|min:1|unique:vendors',
                'address' => 'required|min:1',
                'email' => 'required|min:1',
                'phone' => 'required|min:1',
            ]);

            // Simpan data
            Vendor::create([
                'name' => $this->name,
                'address' => $this->address,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            session()->flash('success', 'Data vendor baru berhasil ditambahkan');
            return $this->redirectRoute('daftar-vendor.index');
        } catch (ValidationException $e) {
            // Tambahkan flash message jika gagal
            session()->flash('errors', 'Validasi gagal! Periksa kembali input Anda.');
            throw $e; // tetap lempar error supaya pesan validasi ditampilkan
        }
    }


}
