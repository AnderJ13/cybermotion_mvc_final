<main>
    <?php if (isset($_SESSION['usuario'])): ?>
        <h1>¡Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h1>
        <a href="/MVC_PAGINAWEB/public/?action=logout">Cerrar Sesión</a>
    <?php else: ?>
        <p>Por favor <a href="/MVC_PAGINAWEB/public/?action=login">inicia sesión</a>.</p>
    <?php endif; ?>
</main>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>