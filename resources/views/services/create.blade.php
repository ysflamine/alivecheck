<x-layouts.app titulo="AliveCheck - Añadir servicio">
<form action="{{ route('services.store') }}" method="POST">
    @csrf 
    {{-- Campo de nombre del servicio, hacemos uso del componente --}}
    <x-campo nombre="name" etiqueta="Nombre del servicio" placeholder="Nombre del servicio/web"/>
    {{-- Campo de URL o IP del servicio haciendo uso del componente --}}
    <x-campo nombre="target" etiqueta="URL o IP a comprobar" placeholder="Ej: https://www.google.com"/>
<button type="submit" class="btn btn-success">Añadir servicio</button>
</form>
</x-layouts.app>