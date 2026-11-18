@php
    // Mapeamos el tipo a la clase de Bootstrap correspondiente
    $alertClass = match($type ?? 'info') {
        'success' => 'alert-success',
        'danger'  => 'alert-danger',
        'warning' => 'alert-warning',
        default   => 'alert-info',
    };
    
    // Iconos opcionales para hacerlo más pro (puedes usar los de Bootstrap Icons)
    $icon = match($type ?? 'info') {
        'success' => 'bi-check-circle-fill',
        'danger'  => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        default   => 'bi-info-circle-fill',
    };
@endphp

<div class="alert {{ $alertClass }} alert-dismissible fade show" role="alert">
    <i class="bi {{ $icon }} me-2"></i> {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>