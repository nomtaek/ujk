<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>☕ Toko Kopi - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f1e9; }
        .navbar { background-color: #3e1f00 !important; }
        .navbar-brand, .nav-link { color: #f5deb3 !important; }
        .btn-coffee { background-color: #6f3d1f; color: white; border: none; }
        .btn-coffee:hover { background-color: #3e1f00; color: white; }
        .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .sidebar { background-color: #3e1f00; min-height: 100vh; }
        .sidebar a { color: #f5deb3; text-decoration: none; display: block; padding: 10px 16px; border-radius: 6px; }
        .sidebar a:hover { background-color: #6f3d1f; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold fs-5" href="{{ route('kopi.index') }}">
            ☕ Toko Kopi
        </a>
        <div class="ms-auto">
            <span class="text-warning me-3">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-outline-warning">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="[cdn.jsdelivr.net](https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js)"></script>
</body>
</html>
