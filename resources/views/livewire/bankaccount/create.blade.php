<section id="main">
    <div class="container pt-4">
        <h1>Buat Akun Bank</h1>
        <div class="pt-4 pb-4">
            <a href="{{ route('bank-account.index') }}" class="btn btn-outline-secondary rounded-pill" wire:navigate>
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
                        <form wire:submit="save">
                            <div class="form-group">
                                <label>Nomor Akun</label>
                                <input type="text" class="form-control @error('account_number') is-invalid @enderror"
                                    wire:model="account_number">
                                @error('account_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control @error('account_name') is-invalid @enderror"
                                    wire:model="account_name">
                                @error('account_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <div class="pt-4 float-end">
                                    <button type="submit" class="btn btn-secondary rounded-pill">
                                        <i class="bi bi-plus-circle"></i>
                                        Tambah
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