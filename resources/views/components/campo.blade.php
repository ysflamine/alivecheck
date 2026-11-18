@props(['nombre', 'etiqueta', 'tipo' => 'text', 'placeholder' => ''])
<div class="mb-3">
    {{-- etiqueta--}}
    <label for="{{ $nombre }}" class="form-label">{{ $etiqueta }}</label>
    {{-- input--}}
    {{-- old() es para que si hay error en el formulario el usuario no tenga que volver a escribirlo--}}
    {{-- para la seccion error/enderror, he copiado eso de la documentacion oficial, indica que si hay error en mi caso, metera la palabra is-invalid en meido "class="form-control is-invalid"" si no ignora y la clase quedaria normal "class="form-control" --}}
    <input  type="{{ $tipo }}"  name="{{ $nombre }}"  id="{{ $nombre }}"  value="{{ old($nombre)}}"  placeholder="{{ $placeholder }}" class="form-control @error($nombre) is-invalid @enderror" required>
    {{-- mensaje de error--}}
    @error($nombre)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
