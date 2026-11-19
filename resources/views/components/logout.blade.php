<form action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-sm">
        <i class="bi bi-box-arrow-right me-1"></i> Salir
    </button>
</form>