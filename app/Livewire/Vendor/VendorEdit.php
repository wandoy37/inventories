<?php

namespace App\Livewire\Vendor;

use App\Models\RekeningVendor;
use App\Models\Vendor;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class VendorEdit extends Component
{
    public ?Vendor $vendor;
    public array $rekenings = [];

    public $name = '';
    public $address = '';
    public $email = '';
    public $phone = '';

    // Model Rekening
    public $vendor_id, $bank_name, $rekening_number;

    public function mount(Vendor $vendor)
    {
        $this->name = $this->vendor->name;
        $this->address = $this->vendor->address;
        $this->email = $this->vendor->email;
        $this->phone = $this->vendor->phone;

        $this->vendor = $vendor->load('rekenings');
         $this->rekenings = $this->vendor->rekenings
        ->keyBy('id')
        ->map(fn ($u) => [
            'vendor_id'        => $u->vendor_id,
            'bank_name'        => $u->bank_name,
            'rekening_number'  => $u->rekening_number, // <-- jangan vendor_id
        ])
        ->toArray();
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

    public function addRekening()
    {
        try {
            // Validate
            $validated = $this->validate([
                'bank_name'       => ['required','string'],
                'rekening_number'   => ['required','min:1'],
            ]);
                
            RekeningVendor::create([
                'vendor_id' => $this->vendor->id,
                'bank_name'       => $this->bank_name,
                'rekening_number'   => $this->rekening_number,
            ]);

            $this->vendor->refresh()->load('rekenings');

            $this->reset(['bank_name','rekening_number']);
            $this->resetValidation();
            return redirect()
            ->route('daftar-vendor.edit', $this->vendor->id)
            ->with('success', 'Rekening Vendor berhasil ditambahkan');
        } catch (ValidationException $e) {
            session()->flash('errors', 'Tambah Rekening Vendor gagal! Periksa kembali input Anda.');
            throw $e;
        }
    }

    public function delete($id)
    {
        $rekening = RekeningVendor::findOrFail($id);
        $rekening->delete();
        session()->flash('warning', 'Rekening ' . $rekening->bank_name . ' Vendor ' . $rekening->vendor->name . 'telah di hapus');
        return $this->redirectRoute('daftar-vendor.edit', $this->vendor->id);
    }
}
