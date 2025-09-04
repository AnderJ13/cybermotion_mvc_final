<header class="main-header">
    <div class="header-col"></div>
    <span class="logo">Cybermotion</span> <!-- MANTIENE tamaño original -->
    
    <div class="header-buttons">
        <?php if (isset($_SESSION['usuario_nombre'])): ?>
            <!-- SOLO el nombre de usuario es más pequeño -->
            <div class="user-menu">
                <span class="user-name" title="¡Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!">
                    👋 <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>
                </span>
                <a href="/MVC_PAGINAWEB/public/?action=logout" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Salir
                </a>
            </div>
        <?php else: ?>
            <!-- Botón de login mantiene tamaño original -->
            <a href="/MVC_PAGINAWEB/public/?action=login" class="login-btn">
                <i class="fas fa-user"></i> Ingresar
            </a>
        <?php endif; ?>
    </div>
</header>