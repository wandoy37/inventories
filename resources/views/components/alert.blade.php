@php
$clases = '';
$key = null;
$icon = null;

if (session('success')) {
$clases = 'alert-success';
$key = 'success';
$icon = 'bi bi-check-circle me-2';
}

if (session('errors')) {
$clases = 'alert-danger';
$key = 'errors';
$icon = 'bi bi-exclamation-circle me-2';
}

if (session('warning')) {
$clases = 'alert-warning';
$key = 'warning';
$icon = 'bi bi-info-circle me-2';
}
@endphp



@if ($key && session($key))
<div class="row">
        <div class="col-lg-12">
                <div class="alert {{ $clases }} alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="{{ $icon }}"></i>
                        <div>
                                {{ session($key) }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        </div>
</div>
@endif