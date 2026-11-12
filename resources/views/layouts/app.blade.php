<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AliveCheck')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-activity me-2"></i> AliveCheck
            </a>
            <a href="{{ route('services.create') }}" class="btn btn-outline-light btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Añadir servicio
            </a>
        </div>
    </nav>

    <div class="container">
        @yield('contenido')
    </div>

    <footer class="text-center text-muted mt-5 mb-3">
        <small>&copy; 2026 AliveCheck. Todos los derechos reservados.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>        
</body>
</html>