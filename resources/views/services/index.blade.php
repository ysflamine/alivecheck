@extends('layouts.app')

@section('titulo', 'AliveCheck - Panel de Monitorización')

@section('contenido')
   @if (session('exito'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
           <i class="bi bi-check-circle-fill me-2"></i> {{ session('exito') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       </div>
   @endif

<!-- En lugar de usar una condición y un bucle, Laravel tiene una directiva mágica llamada forelse. -->
<!-- Hace el bucle, pero si la colección está vacía, ejecuta automáticamente un bloque empty -->
<div class="row">
@forelse ($services as $service)
    <!-- diseño de cada tarjeta -->
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $service->name }}</h5>
                <p class="card-text">{{ $service->target }}</p>
                <p class="card-text"><small class="text-muted">Última verificación: {{ $service->last_checked_at?->diffForHumans() ?? 'Nunca' }}</small></p> <!-- operador nullsafe, permite acceder a métodos y propiedades de un objeto que puede ser null -->
                <p class="card-text"><small class="text-muted">Estado: 
                    @if ($service->last_status === 'up')
                        <span class="badge bg-success">Activo</span>
                    @elseif ($service->last_status === 'down')
                        <span class="badge bg-danger">Caído</span>
                    @else
                        <span class="badge bg-secondary">Desconocido</span>
                    @endif
                </small></p>
            </div>
        </div>
    </div>
@empty
</div>
    <!-- mensaje: "No hay servicios registrados aún" con una alerta de Bootstrap -->
    <div class="alert alert-info" role="alert"> No hay servicios registrados aún. <a href="{{ route('services.create') }}" class="alert-link">Añade un servicio</a> para empezar a monitorizar. </div>
@endforelse
</div>
@endsection

