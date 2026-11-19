<x-layouts.auth titulo="AliveCheck - Acceso Administrador">
    <div class="card border-secondary-subtle shadow-sm" style="width: 100%; max-width: 380px;">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <i class="bi bi-shield-lock-fill text-primary fs-1"></i>
            </div>
            <h1 class="fs-5 fw-semibold text-center mb-4">Acceso a AliveCheck</h1>

            @if (session('error'))
                <x-alert type="danger" :message="session('error')" class="mb-3" />
            @endif

            <form action="{{ route('login.attempt') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="form-label small text-secondary">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control @error('usuario') is-invalid @enderror" value="{{ old('usuario') }}" autocomplete="username" required autofocus>
                    @error('usuario')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label small text-secondary">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button class="btn btn-primary w-100 fw-semibold" type="submit">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión
                </button>
            </form>

            <p class="text-center small text-body-secondary mt-4 mb-0">
                <i class="bi bi-info-circle me-1"></i> Panel de administración único
            </p>
        </div>
    </div>
</x-layouts.auth>