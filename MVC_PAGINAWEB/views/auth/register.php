<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - CyberMotion</title>
   <link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/estilos.css">
   <link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">CYBERMOTION</div>
    </header>

    <main class="login-page">
        <div class="login-box">
            <h2>Crear Cuenta</h2>
           
<form action="/MVC_PAGINAWEB/public/?action=register" method="POST">
    <input type="text" name="nombre" placeholder="Nombre Completo" required>
    <input type="email" name="email" placeholder="Correo Electrónico" required>
    <input type="tel" name="telefono" placeholder="Teléfono" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>

            <p>¿Ya tienes una cuenta? <a href="/MVC_PAGINAWEB/views/auth/login.php">Iniciar Sesión</a></p>
        </div>
    </main>

    <footer>
        &copy; 2024 CIBER MOTION. Todos los derechos reservados.
        <div class="social-links">  
            <a href="https://www.facebook.com" target="_blank">Facebook</a>
            <a href="https://www.twitter.com" target="_blank">Twitter</a>
            <a href="https://www.instagram.com" target="_blank">Instagram</a>
    </footer>
</body>
</html>
