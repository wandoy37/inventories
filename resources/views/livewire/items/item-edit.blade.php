<section id="main">
    <div class="container pt-4">
        <h1>Edit Data Barang {{ $item->name}}</h1>
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
                    <div class="card-body">
                        <form wire:submit="update">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            wire:model.live.debounce.300ms="name">
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
                                    wire:model="description">
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <div class="pt-4 float-end">
                                    <button type="submit" class="btn btn-secondary rounded-pill">
                                        <i class="bi bi-arrow-repeat"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Form Create --}}
    </div>
</section>