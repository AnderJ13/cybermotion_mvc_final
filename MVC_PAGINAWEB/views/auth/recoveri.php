<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - CIBER MOTION</title>
    <!-- Unifica tus CSS en un solo archivo -->
    <link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/registro.css">
</head>

<body>
    <header>
        <div class="logo">CYBERMOTION</div>
    </header>

    <main class="login-page">
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            
            <?php if (isset($_GET['error'])): ?>
                <div class="error-message" style="color: red; margin: 15px 0;">
                    ¡Correo o contraseña incorrectos!
                </div>
            <?php endif; ?>
            
            <p>¿No tienes una cuenta? <a href="/MVC_PAGINAWEB/public/?action=register">Regístrate aquí</a></p>
            <br>
            
            <!-- Cambia action al controlador MVC -->
            <form action="/MVC_PAGINAWEB/public/?action=login" method="POST">
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </main>

    <footer>
        <center>
            &copy; 2024 CIBER MOTION. Todos los derechos reservados.
            <div class="social-links">
                <a href="https://www.facebook.com" target="_blank">Facebook</a>
                <a href="https://www.twitter.com" target="_blank">Twitter</a>
                <a href="https://www.instagram.com" target="_blank">Instagram</a>     
            </div>  
            <a href="https://wa.me/50370123456" class="whatsapp-float" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
            </a>
        </center>
    </footer>
</body>
</html>