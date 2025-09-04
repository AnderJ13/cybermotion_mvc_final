<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - CyberMotion</title>
   <link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/estilos.css">
   <link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/style.css">
   <link rel="stylesheet" href="/MVC_PAGINAWEB/public/assets/css/registro.css">
   
</head>
<body>
    <header>
        <div class="logo">CYBERMOTION</div>
    </header>

    <main class="login-page">
        <div class="login-box">
            <h2>Crear Cuenta</h2>
           
            <?php if (isset($_GET['error']) && $_GET['error'] === 'email_exists'): ?>
                <div class="error-message" style="color: red; margin: 15px 0;">
                    ❌ Este correo electrónico ya está registrado
                </div>
            <?php elseif (isset($_GET['error'])): ?>
                <div class="error-message" style="color: red; margin: 15px 0;">
                    ❌ Error en el registro. Inténtalo de nuevo.
                </div>
            <?php endif; ?>
           
<form action="/MVC_PAGINAWEB/public/?action=register<?php echo isset($_GET['redirect']) ? '&redirect=' . $_GET['redirect'] : ''; ?>" method="POST">
    <input type="text" name="nombre" placeholder="Nombre Completo" required 
           value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
    
    <input type="email" name="email" placeholder="Correo Electrónico" required 
           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
    
    <input type="tel" name="telefono" placeholder="Teléfono" required 
           value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>">
    
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>

            <p>¿Ya tienes una cuenta? <a href="/MVC_PAGINAWEB/public/?action=login">Iniciar Sesión</a></p>
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