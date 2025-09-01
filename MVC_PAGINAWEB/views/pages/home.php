<?php
// Esto debe ser lo PRIMERO en el archivo
session_start();
require_once __DIR__ . '/../partials/header.php';
?>

<main>
    <!-- Contenido libre para todos -->
    <section class="product-info">
        <!-- ... (tu contenido actual) ... -->
    </section>

    <!-- Mensaje opcional si ESTÁ logueado -->
    <?php if (isset($_SESSION['usuario_nombre'])): ?>
        <div class="welcome-message">
            ¡Hola de nuevo, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>!
        </div>
    <?php endif; ?>
</main>

<?php 
require_once __DIR__ . '/../partials/footer.php'; 
?>