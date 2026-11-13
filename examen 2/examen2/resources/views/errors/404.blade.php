<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página no encontrada</title>
    
    <!-- SEO Optimization -->
    <meta name="description" content="404 Page Not Found - Spark Admin Premium Bootstrap 5 Admin Dashboard Template">
    <meta name="author" content="Spark Admin Team">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
    
    <!-- Local Third-Party Libraries (100% Offline Compatible) -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    
    <!-- Main Design System & Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>

    <!-- ==========================================
         START: 404 Error Page Container & Card
         ========================================== -->
    <div class="login-wrapper">
        <!-- Glowing background shapes matching theme aesthetic -->
        <div class="login-bg-shape login-bg-shape-1"></div>
        <div class="login-bg-shape login-bg-shape-2"></div>
        
        <!-- Main centered error card layout -->
        <div class="login-card text-center">
            
            <!-- Brand Identity -->
            <a href="{{ url('/') }}" class="login-brand text-decoration-none">
                <i class="bi bi-asterisk"></i>
                <span>Spark Admin</span>
            </a>
            
            <!-- Giant 404 header with spinning asterisk Zero -->
            <div class="error-title-huge">
                <span>4</span>
                <i class="bi bi-asterisk"></i>
                <span>4</span>
            </div>
            
            <h2 class="error-subtitle">Página no encontrada</h2>
            <p class="error-desc">
                La página que buscas no existe, cambió de nombre o no está disponible.
            </p>
            
            <div class="error-actions-group">
                <a href="{{ url('/') }}" class="btn-custom btn-custom-primary">
                    <i class="bi bi-house"></i> Volver al inicio
                </a>
            </div>
            
        </div>
    </div>
    <!-- END: 404 Error Page Container -->

    <!-- Local Third-Party Libraries Script dependencies -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
