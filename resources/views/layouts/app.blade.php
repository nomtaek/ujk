<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>☕ Toko Kopi - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8f1e9; }
        .navbar { background-color: #3e1f00 !important; }
        .navbar-brand, .nav-link { color: #f5deb3 !important; }
        .nav-link:hover { color: #ffffff !important; background-color: rgba(111, 61, 31, 0.5); border-radius: 6px; }
        .nav-link.active { background-color: #6f3d1f; border-radius: 6px; }
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
        <a class="navbar-brand fw-bold fs-5" href="{{ route('dashboard') }}">
            ☕ Toko Kopi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kopi.*') ? 'active' : '' }}" href="{{ route('kopi.index') }}">
                        <i class="bi bi-cup-hot me-1"></i> Jenis Kopi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}" href="{{ route('supplier.index') }}">
                        <i class="bi bi-truck me-1"></i> Pemasok
                    </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-warning" style="cursor: default;">
                        <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-warning ms-2">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
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
