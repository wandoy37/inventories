<section id="main">
    <div class="container pt-4">
        <h1>Data Barang : {{ $name }} ({{ $code }})</h1>
        <div class="pt-4 pb-4">
            <a href="{{ route('daftar-barang.index') }}" class="btn btn-outline-secondary rounded-pill" wire:navigate>
                <i class="bi bi-arrow-left-circle"></i>
                Kembali
            </a>
        </div>

        <x-alert />

        {{-- Form Create --}}
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        wire:model.live.debounce.300ms="name" readonly>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        wire:model="code" name="code" readonly>
                                    @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                wire:model="description" readonly>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stock Awal</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-grid">
                                    <x-form-add-units />
                                </div>
                            </div>
                        </div>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Harga Beli/Modal</th>
                                    <th scope="col">Harga Jual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->units as $id => $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->quantitiy }}</td>
                                    <td>{{ number_format($u->price_buy, 0, ',', '.') }}</td>
                                    <td>{{ number_format($u->price_sell, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="4">
                                        <strong><u> Data tidak ditemukan</u></strong>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Form Create --}}
    </div>
</section>