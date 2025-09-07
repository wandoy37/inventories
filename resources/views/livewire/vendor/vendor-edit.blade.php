<section id="main">
    <div class="container pt-4">
        <h1>Edit Data Vendor - {{ $vendor->name }}</h1>
        <div class="pt-4 pb-4">
            <a href="{{ route('daftar-vendor.index') }}" class="btn btn-outline-secondary rounded-pill" wire:navigate>
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
                            <div class="form-group">
                                <label>Nama Vendor / Supplier</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                    <textarea cols="30" class="form-control @error('address') is-invalid @enderror" rows="2" wire:model="address"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Handphone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    wire:model="phone">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
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