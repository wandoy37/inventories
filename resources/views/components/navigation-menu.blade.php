<!-- Navbar -->
<section id="navbar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 w-100 justify-content-evenly">
                                        <li class="nav-item">
                                                <a class="nav-link" wire:navigate wire:current="active"
                                                        href="{{ route('dashboard.index') }}">Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" wire:navigate wire:current="active"
                                                        href="{{ route('pengguna.index') }}">Pengguna</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" wire:navigate wire:current="active"
                                                        href="{{ route('daftar-barang.index') }}">Daftar
                                                        Barang</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle {{ request()->routeIs('daftar-vendor.*') ? 'active' : '' }}" wire:navigate wire:current="active" role="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">Pembelian</a>
                                                <ul class="dropdown-menu">
                                                        <li>
                                                                <a class="dropdown-item" href="{{route('daftar-vendor.index')}}">Data Vendor</a>
                                                        </li>
                                                        <li>
                                                                <a class="dropdown-item" href="#">Stock Opname</a>
                                                        </li>
                                                        <li>
                                                                <a class="dropdown-item" href="#">Hutang</a>
                                                        </li>
                                                        <li>
                                                                <a class="dropdown-item" href="#">Pengembalian</a>
                                                        </li>
                                                </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <button class="nav-link dropdown-toggle" role="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">Penjualan</button>
                                                <ul class="dropdown-menu">
                                                        <li>
                                                                <a class="dropdown-item" href="#">Kasir</a>
                                                        </li>
                                                        <li>
                                                                <a class="dropdown-item" href="#">Faktur</a>
                                                        </li>
                                                </ul>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="{{ route('bank-account.index') }}"
                                                        wire:navigate wire:current="active">
                                                        Akun Bank
                                                </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <button class="nav-link dropdown-toggle" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">Laporan</button>
                                                <ul class="dropdown-menu">
                                                        <li>
                                                                <a class="dropdown-item" href="#">Pembelian</a>
                                                        </li>
                                                        <li>
                                                                <a class="dropdown-item" href="#">Hutang</a>
                                                        </li>
                                                        <li>
                                                                <a class="dropdown-item" href="#">Pengembalian</a>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                                <a class="dropdown-item" href="#">Penjualan</a>
                                                        </li>
                                                </ul>
                                        </li>
                                </ul>
                                <div class="d-flex" role="search">
                                        <div class="dropdown">
                                                <button href="http://" class="dropdown-toggle nav-link"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <u class="fw-bold">{{ Auth::user()->username }}</u>
                                                </button>
                                                <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                                        <hr />
                                                        <form action="/logout" method="POST" style="display:inline;">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">Logout</button>
                                                        </form>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </nav>
</section>
<!-- End Navbar -->

@push('scripts')
    <script>
        document.querySelectorAll('.nav-item.dropdown').forEach(function (dropdown) {
                dropdown.addEventListener('mouseenter', function () {
                        let toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
                        let menu = new bootstrap.Dropdown(toggle);
                        menu.show();
                });

                dropdown.addEventListener('mouseleave', function () {
                        let toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
                        let menu = bootstrap.Dropdown.getInstance(toggle);
                        menu.hide();
                });
        });
    </script>
@endpush