<body>
    <header>
        <div class="logo">CIBER MOTION</div>
        <nav>
            <?php if (isset($_SESSION['usuario_nombre'])): ?>
                <span class="welcome-msg">Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
                <a href="/MVC_PAGINAWEB/public/?action=logout" class="btn-logout">Salir</a>
            <?php else: ?>
                <a href="/MVC_PAGINAWEB/public/?action=login" class="btn-login">Iniciar sesión</a>
            <?php endif; ?>
        </nav>
    </header>