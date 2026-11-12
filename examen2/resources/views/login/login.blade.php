<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar sesión - {{ config('app.name') }}</title>

    <!-- SEO Optimization -->
    <meta name="description" content="Login Screen - Spark Admin Premium Bootstrap 5 Admin Dashboard Template">
    <meta name="author" content="Spark Admin Team">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Local Third-Party Libraries (100% Offline Compatible) -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Main Design System & Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>.login-input.is-invalid { box-shadow: 0 0 0 1px #dc3545; }</style>
</head>
<body>

<!-- ==========================================
     START: Authentication Container & Login Card
     ========================================== -->
<div class="login-wrapper">
    <!-- Glowing background shapes for modern visual appearance -->
    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <!-- Main centered login card -->
    <div class="login-card">

        <!-- Brand Identity -->
        <a href="{{ route('dashboard') }}" class="login-brand text-decoration-none">
            <i class="bi bi-flower2"></i>
            <span>AGROVALLE</span>
        </a>

        <p class="login-subtitle">Sistema de gestión interna. Inicia sesión con tu correo institucional.</p>

        <!-- Login Form -->
        <form action="{{ route('login.post') }}" method="POST" id="loginForm" class="needs-validation" novalidate>
            @csrf


            <!-- Email Input Group -->
            <div class="login-form-group">
                <label for="email" class="login-form-label">Correo electrónico</label>
                <div class="login-input-group">
                    <i class="bi bi-envelope input-icon"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="login-input @error('email') is-invalid @enderror" placeholder="usuario@agrovalle.hn" required autofocus>
                </div>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input Group -->
            <div class="login-form-group">
                <label for="password" class="login-form-label">Contraseña</label>
                <div class="login-input-group">
                    <i class="bi bi-shield-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="login-input login-input-password @error('password') is-invalid @enderror" placeholder="••••••••" required>
                    <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Options (Remember me & Forgot Password) -->
            <div class="login-options">
                <label class="custom-control-label">
                    <input type="checkbox" class="custom-checkbox-input" id="rememberMe" name="remember" value="1">
                    <span>Recordarme</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-login" id="btn-submit">
                <span>Entrar al panel</span>
                <i class="bi bi-arrow-right"></i>
            </button>

        </form>

    </div>
</div>
<!-- END: Authentication Container -->

<!-- Local Bootstrap bundle -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom Authentication interactions script -->
<script src="{{ asset('assets/js/auth.js') }}"></script>
</body>
</html>
