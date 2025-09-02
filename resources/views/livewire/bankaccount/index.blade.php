<section id="main">
    <div class="container pt-4">
        <h1>Akun Bank</h1>
        <div class="pt-4 pb-4">
            <a href="{{ route('bank-account.create') }}" class="btn btn-outline-secondary rounded-pill" wire:navigate>
                <i class="bi bi-plus-circle"></i>
                Akun
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
                                    <th scope="col" style="width: 22%">Nomor Rekening</th>
                                    <th scope="col">Nama Bank</th>
                                    <th scope="col" style="width: 13%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($bankAccounts as $ba)
                                <tr wire:key="ba-{{ $ba->id }}">
                                    <th scope="row">{{ $loop->iteration + $bankAccounts->firstItem() - 1 }}</th>
                                    <td>{{ $ba->account_number }}</td>
                                    <td>{{ $ba->account_name }}</td>
                                    <td class="d-flex justify-content-between">
                                        <a href="{{ route('bank-account.edit', $ba->id) }}" wire:navigate
                                            class="text-decoration-none text-dark">
                                            <i class="bi bi-pencil"></i> <u>Edit</u>
                                        </a>
                                        <button class="text-decoration-none text-dark" type="button">
                                            <i class="bi bi-trash"></i> <u>Hapus</u>
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
                        {{ $bankAccounts->links() }}
                    </div>
                </div>
            </div>
        </div>
</section>