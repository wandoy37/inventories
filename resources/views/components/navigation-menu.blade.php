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
                                                <a class="nav-link" href="/daftar-barang.html">Daftar Barang</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <button class="nav-link dropdown-toggle" role="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">Pembelian</button>
                                                <ul class="dropdown-menu">
                                                        <li>
                                                                <a class="dropdown-item" href="#">Data Vendor</a>
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
                                                <a class="nav-link" href="#">Akun Bank</a>
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
                                                        <u class="fw-bold">Username</u>
                                                </button>
                                                <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                                        <hr />
                                                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
        </nav>
</section>
<!-- End Navbar -->