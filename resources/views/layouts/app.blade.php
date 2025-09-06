<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/icons/bootstrap-icons.css" />
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/select2/css/select2.min.css" />
    <!-- Flatpicker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

    <!-- MGI Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/main.css" />
    <!-- MGI Fonts CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/quicksand-fonts.css" />
    @livewireStyles
</head>
<body>
    <x-navigation-menu />
    {{ $slot }}

    <!-- Footer -->
    <section id="footer">
        <div class="container">
            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; {{ date('Y') }} Mulia Group Informatika, Inc. All rights reserved.</p>
            </div>
        </div>
    </section>
    <!-- End Footer -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery JS -->
    <script src="{{ asset('assets') }}/jquery-3.7.1.slim.min.js"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('assets') }}/select2/js/select2.min.js"></script>
    <!-- Flatpicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @stack('scripts')

    @livewireScripts

    <!-- Select2 Example -->
    <script>
        $(document).ready(function () {
                $(".select-vendor").select2();
            });
    </script>
    <!-- End Select2 Example -->

    {{-- Tambahkan script di bawah ini --}}
    <script>
        document.addEventListener('livewire:navigated', () => {
        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    });
    </script>

    <!-- Datepicker -->
    <script>
        flatpickr("#flatpickr", {
                dateFormat: "d-m-Y",
                allowInput: true,
            });
    </script>
    <!-- End Datepicker -->
</body>
</html>