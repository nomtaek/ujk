<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #2c1810 0%, #3e1f00 50%, #6f3d1f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Background decorative elements */
        body::before {
            content: '☕';
            position: fixed;
            font-size: 15rem;
            opacity: 0.05;
            top: -50px;
            right: -50px;
            z-index: 0;
            pointer-events: none;
        }

        body::after {
            content: '☕';
            position: fixed;
            font-size: 12rem;
            opacity: 0.05;
            bottom: -30px;
            left: -50px;
            z-index: 0;
            pointer-events: none;
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3),
                        0 0 1px rgba(255, 255, 255, 0.5) inset;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #3e1f00, #6f3d1f);
            padding: 40px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        }

        .logo-icon {
            font-size: 4rem;
            margin-bottom: 15px;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }

        .login-header p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin: 0;
        }

        .login-body {
            padding: 40px;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 600;
            color: #2c1810;
            margin-bottom: 10px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .form-group label i {
            margin-right: 8px;
            color: #6f3d1f;
            font-size: 1.1rem;
        }

        .form-control {
            border: 2px solid #e8dcc8;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #faf8f3;
        }

        .form-control:focus {
            border-color: #6f3d1f;
            background-color: white;
            box-shadow: 0 0 0 0.2rem rgba(111, 61, 31, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        /* Input group styling */
        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6f3d1f;
            pointer-events: none;
        }

        .form-control-with-icon {
            padding-right: 40px;
        }

        /* Error styling */
        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.1);
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        /* Remember me checkbox */
        .form-check {
            margin-bottom: 25px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 2px solid #e8dcc8;
            margin-top: 3px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #6f3d1f;
            border-color: #6f3d1f;
        }

        .form-check-label {
            font-size: 0.95rem;
            color: #555;
            cursor: pointer;
            margin-left: 8px;
        }

        /* Button styling */
        .btn-login {
            width: 100%;
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #6f3d1f, #3e1f00);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(111, 61, 31, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #3e1f00, #2c1810);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(111, 61, 31, 0.4);
        }

        .btn-login:hover::before {
            left: 0;
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(111, 61, 31, 0.2);
        }

        /* Alert styling */
        .alert {
            border: none;
            border-radius: 12px;
            margin-bottom: 25px;
            animation: slideDown 0.4s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background-color: #fff5f5;
            color: #c41e3a;
            border-left: 4px solid #dc3545;
        }

        /* Footer info */
        .login-footer {
            text-align: center;
            padding: 20px 40px;
            border-top: 1px solid #f0f0f0;
            font-size: 0.85rem;
            color: #999;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 15px;
            }

            .login-body {
                padding: 30px 25px;
            }

            .login-header {
                padding: 30px 20px;
            }

            .logo-icon {
                font-size: 3rem;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-icon">☕</div>
                <h1>Toko Kopi</h1>
                <p>Sistem Manajemen Inventori</p>
            </div>

            <!-- Body -->
            <div class="login-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle-fill me-2"></i>
                        <strong>Login Gagal!</strong>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="email">
                            <i class="bi bi-envelope"></i>Email Anda
                        </label>
                        <div class="input-group">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control form-control-with-icon @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required
                                autofocus
                            >
                            <i class="bi bi-envelope input-icon"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password">
                            <i class="bi bi-lock"></i>Password
                        </label>
                        <div class="input-group">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control form-control-with-icon @error('password') is-invalid @enderror"
                                placeholder="Masukkan password Anda"
                                required
                            >
                            <i class="bi bi-lock input-icon"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input
                            type="checkbox"
                            name="remember"
                            class="form-check-input"
                            id="remember"
                        >
                        <label class="form-check-label" for="remember">
                            Ingat saya di perangkat ini
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <i class="bi bi-shield-lock me-1"></i>Akun Anda dilindungi dengan enkripsi tingkat enterprise
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
