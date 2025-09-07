<section id="main">
    <div class="container pt-4">
        <h1>Daftar Vendor</h1>
        <div class="pt-4 pb-4">
            <a href="{{ route('daftar-vendor.create') }}" class="btn btn-outline-secondary rounded-pill" wire:navigate>
                <i class="bi bi-plus-circle"></i>
                Vendor
            </a>
        </div>


        <x-alert />

        <div class="row pt-4 pb-4">
            <div class="col-lg-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Pencarian</span>
                    <input type="text" class="form-control" wire:model.live="search" />
                </div>
                <div class="card">
                    <div class="card-body border-top border-5 rounded border-dark-subtle">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 5%">No</th>
                                    <th scope="col" style="width: 18%">Nama Vendor / Supplier</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No. Handphone</th>
                                    <th scope="col" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($vendors as $vd)
                                    <tr wire:key="ba-{{ $vd->id }}">
                                        <th scope="row">{{ $loop->iteration + $vendors->firstItem() - 1 }}</th>
                                        <td>{{ $vd->name }}</td>
                                        <td>{{ $vd->address }}</td>
                                        <td>{{ $vd->email }}</td>
                                        <td>{{ $vd->phone }}</td>
                                        <td class="d-flex justify-content-between">
                                            <a href="{{ route('daftar-vendor.edit', $vd->id) }}" wire:navigate
                                                class="text-decoration-none text-dark">
                                                <i class="bi bi-pencil"></i> <u>Edit</u>
                                            </a>
                                            <button wire:click="delete({{ $vd->id }})"
                                            wire:confirm="Anda yakin ingin menghapus data vendor ini?"
                                            class="btn btn btn-danger btn-sm">
                                            <i class="bi bi-trash me-1"></i>
                                            Delete
                                        </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $vendors->links() }}
                    </div>
                </div>
            </div>
        </div>
</section>

@push('scripts')
{{-- Sweetalert --}}
@include('sweetalert::alert')
@endpush