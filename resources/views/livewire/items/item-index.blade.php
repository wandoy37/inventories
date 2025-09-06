<section id="main">
    <div class="container pt-4">
        <h1>Daftar Barang</h1>
        <div class="pt-4 pb-4">
            <a href="{{ route('daftar-barang.create') }}" class="btn btn-outline-secondary rounded-pill" wire:navigate>
                <i class="bi bi-plus-circle"></i>
                Barang
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
                                    <th scope="col" style="width: 10%">Kode Barang</th>
                                    <th scope="col" style="width: 20%">Nama Barang</th>
                                    <th scope="col" style="width: 30%">Keterangan</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($items as $it)
                                <tr wire:key="it-{{ $it->id }}">
                                    <th scope="row">{{ $loop->iteration + $items->firstItem() - 1 }}</th>
                                    <td>{{ $it->code }}</td>
                                    <td>{{ $it->name }}</td>
                                    <td>{{ $it->description }}</td>
                                    <td class="d-flex justify-content-between">
                                        <a href="{{ route('daftar-barang.show', $it->id) }}" wire:navigate
                                            class="text-decoration-none text-dark">
                                            <i class="bi bi-eye me-2"></i> <u>Detail</u>
                                        </a>
                                        <a href="{{ route('daftar-barang.edit', $it->id) }}" wire:navigate
                                            class="text-decoration-none text-dark">
                                            <i class="bi bi-pencil me-2"></i> <u>Edit</u>
                                        </a>
                                        <button wire:click="delete({{ $it->id }})"
                                            wire:confirm="Anda yakin ingin menghapus data barang ini?"
                                            class="btn btn btn-danger btn-sm">
                                            <i class="bi bi-trash me-1"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Tidak ada data
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
</section>