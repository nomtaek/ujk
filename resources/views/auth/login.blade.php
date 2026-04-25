<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #3e1f00, #6f3d1f);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card { border-radius: 16px; }
        .btn-coffee { background-color: #6f3d1f; color: white; border: none; width: 100%; padding: 10px; }
        .btn-coffee:hover { background-color: #3e1f00; color: white; }
    </style>
</head>
<body>
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <span style="font-size: 3rem;">☕</span>
                <h4 class="fw-bold mt-2" style="color: #3e1f00;">Toko Kopi</h4>
                <p class="text-muted small">Masuk ke dashboard Anda</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        required autofocus
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-coffee">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
