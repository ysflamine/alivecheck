@extends('layouts.app')

@section('contenido')
<form action="{{ route('services.store') }}" method="POST">
    @csrf <!-- SIEMPRE hay que poner el token de seguridad -->
<div class="mb-3">
    <label for="name" class="form-label">Nombre del servicio</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" value="{{ old('name') }}" required>
    <!-- Este div solo aparece si hay error y Bootstrap lo pinta de rojo -->
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="target" class="form-label" >URL o IP a comprobar</label>
    <input type="text" placeholder="Ej: https://www.google.com" class="form-control @error('target') is-invalid @enderror"  id="target" name="target" value="{{ old('target') }}" required>
    @error('target')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-success">Añadir servicio</button>
</form>
@endsection