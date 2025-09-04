<?php
session_start();
$mensaje = '';


// Verificar el código 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {
    if (isset($_SESSION['codigo_recuperacion']) && $_POST['codigo'] == $_SESSION['codigo_recuperacion']) {
        // Código correcto, redirigir a reset_password.php con el token
        $token = bin2hex(random_bytes(32));
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_token_expiry'] = time() + 1800;
        
        header("Location: reset_password.php?token=$token");
        exit;
    } else {
        $mensaje = "Código incorrecto. Intenta de nuevo.";
    }
}

// Si no hay código en sesión, redirigir al inicio
if (!isset($_SESSION['codigo_recuperacion'])) {
    header("Location: recuperar.php");
    exit;
}

// Verificar si viene del formulario de correo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['correo'])) {
    $codigo = rand(100000, 999999);
    $_SESSION['codigo_recuperacion'] = $codigo; // Guarda el código en la sesión
    $_SESSION['correo_recuperacion'] = $_POST['correo']; // Guarda el correo también
    
    // Aquí iría el código para enviar el correo electrónico en lugar del alert
    echo "<script>
        alert('Tu código de recuperación es: $codigo');
        window.location.href = 'verificacion.php';
    </script>";
    exit;
}

// Verificar el código (ESTE ES EL ARCHIVO verificacion.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {
    if (isset($_SESSION['codigo_recuperacion']) && $_POST['codigo'] == $_SESSION['codigo_recuperacion']) {
        // Código correcto, redirigir a reset_password.php con el token
        $token = bin2hex(random_bytes(32)); // Generar token seguro
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_token_expiry'] = time() + 1800; // 30 minutos de expiración
        
        header("Location: reset_password.php?token=$token");
        exit;
    } else {
        $mensaje = "Código incorrecto. Intenta de nuevo.";
    }
}

// Si no hay código en sesión, redirigir al inicio
if (!isset($_SESSION['codigo_recuperacion'])) {
    header("Location: recuperar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Verificar código de seguridad - CIBERMOTION</title>
  <style>
    body { 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        background: linear-gradient(135deg, #1f1c2c 0%, #928dab 100%); 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        height: 100vh; 
        margin: 0; 
    }
    .verify-box { 
        background: rgba(255,255,255,0.95);
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 8px 32px 0 rgba(31,28,44,0.2);
        width: 350px;
        text-align: center;
    }
    .verify-box h2 {
        margin-bottom: 24px;
        color: #1f1c2c;
        font-size: 1.8rem;
    }
    input { 
        width: 100%; 
        padding: 12px; 
        margin: 15px 0; 
        border-radius: 8px; 
        border: 1px solid #928dab;
        font-size: 1rem;
        background: #f7f7fa;
    }
    input:focus {
        border: 1.5px solid #6a679e;
        outline: none;
    }
    button { 
        background: linear-gradient(90deg, #6a679e 0%, #928dab 100%);
        color: white; 
        border: none; 
        padding: 12px 0; 
        width: 100%; 
        border-radius: 8px; 
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }
    button:hover { 
        background: linear-gradient(90deg, #928dab 0%, #6a679e 100%);
    }
    .mensaje { 
        color: #e74c3c;
        background: #fff0f0;
        border: 1px solid #e74c3c;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 15px;
        font-weight: 500;
    }
    .icon-shield {
        font-size: 2.5rem;
        color: #6a679e;
        margin-bottom: 18px;
    }
    .back-link {
        display: block;
        margin-top: 20px;
        color: #6a679e;
        text-decoration: none;
        font-size: 0.9rem;
    }
    .back-link:hover {
        text-decoration: underline;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <div class="verify-box">
    <div class="icon-shield"><i class="fa-solid fa-shield-halved"></i></div>
    <h2>Verificar código de seguridad</h2>
    <p style="color: #666; margin-bottom: 20px;">Ingresa el código que enviamos a tu correo</p>
    
    <?php if ($mensaje): ?>
      <div class="mensaje"><?= $mensaje ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
      <input type="text" name="codigo" placeholder="Ingresa el código de 6 dígitos" required 
             pattern="[0-9]{6}" title="Debe ser un código de 6 dígitos" maxlength="6">
      <button type="submit">Verificar código</button>
    </form>
    
    <a href="recuperar.php" class="back-link">
        <i class="fas fa-arrow-left"></i> Volver atrás
    </a>
  </div>

  <script>
    // Auto-enfocar el input y validar solo números
    document.addEventListener('DOMContentLoaded', function() {
        const codigoInput = document.querySelector('input[name="codigo"]');
        codigoInput.focus();
        
        codigoInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });
  </script>
</body>
</html>