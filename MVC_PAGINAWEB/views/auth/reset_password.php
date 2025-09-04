<?php
session_start();
$mensaje = '';

// Verificar token válido
if (!isset($_GET['token']) || !isset($_SESSION['reset_token']) || 
    $_GET['token'] !== $_SESSION['reset_token'] ||
    !isset($_SESSION['reset_token_expiry']) || 
    time() > $_SESSION['reset_token_expiry']) {
    
    header("Location: login.php?error=token_invalido");
    exit;
}

// Verificar si hay un correo en sesión
if (!isset($_SESSION['correo_recuperacion'])) {
    header("Location: recuperar.php");
    exit;
}

// Procesar cambio de contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $nueva_password = $_POST['password'];
    $correo = $_SESSION['correo_recuperacion'];
    
    // Validar contraseña
    if (strlen($nueva_password) < 6) {
        $mensaje = "La contraseña debe tener al menos 6 caracteres";
    } else {
        // Conectar a la base de datos y actualizar contraseña
        require_once '../../config/Database.php';
        $database = new Database();
        $db = $database->conn; // ← CAMBIO AQUÍ: usa $database->conn en lugar de getConnection()
        
        // Verificar si la conexión fue exitosa
        if ($db->connect_error) {
            die("Error de conexión: " . $db->connect_error);
        }
        
        $hashed_password = password_hash($nueva_password, PASSWORD_DEFAULT);
        $query = "UPDATE usuarios SET password_hash = ? WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ss", $hashed_password, $correo);
        
        if ($stmt->execute()) {
            // Limpiar sesiones de recuperación
            unset($_SESSION['codigo_recuperacion']);
            unset($_SESSION['correo_recuperacion']);
            unset($_SESSION['reset_token']);
            unset($_SESSION['reset_token_expiry']);
            
            $mensaje = "✅ Contraseña restablecida exitosamente. Redirigiendo al login...";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'login.php?success=password_changed';
                }, 2000);
            </script>";
        } else {
            $mensaje = "❌ Error al restablecer la contraseña. Intenta nuevamente.";
        }
        
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Restablecer contraseña - CIBERMOTION</title>
  <style>
    body {
      background: linear-gradient(135deg, #1f1c2c 0%, #928dab 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .reset-box {
      background: rgba(255,255,255,0.95);
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 8px 32px 0 rgba(31,28,44,0.2);
      width: 350px;
      text-align: center;
      position: relative;
    }
    .reset-box h2 {
      margin-bottom: 24px;
      color: #1f1c2c;
      font-size: 2rem;
      letter-spacing: 1px;
    }
    .reset-box label {
      display: block;
      margin-bottom: 8px;
      color: #333;
      font-weight: 500;
      text-align: left;
    }
    .reset-box input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #928dab;
      font-size: 1rem;
      background: #f7f7fa;
      transition: border 0.2s;
    }
    .reset-box input[type="password"]:focus {
      border: 1.5px solid #6a679e;
      outline: noe;
    }
    .reset-box button {
      background: linear-gradient(90deg, #6a679e 0%, #928dab 100%);
      color: #fff;
      border: none;
      padding: 12px 0;
      width: 100%;
      border-radius: 8px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(31,28,44,0.08);
      transition: background 0.2s;
    }
    .reset-box button:hover {
      background: linear-gradient(90deg, #928dab 0%, #6a679e 100%);
    }
    .mensaje {
      color: #e74c3c;
      background: #fff0f0;
      border: 1px solid #e74c3c;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 18px;
      font-weight: 500;
    }
    .mensaje.exito {
      color: #27ae60;
      background: #f0fff4;
      border: 1px solid #27ae60;
    }
    .icon-lock {
      font-size: 2.5rem;
      color: #6a679e;
      margin-bottom: 18px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <div class="reset-box">
    <div class="icon-lock"><i class="fa-solid fa-lock"></i></div>
    <h2>Restablecer contraseña</h2>
    
    <?php if (!empty($mensaje)): ?>
        <p class="mensaje <?php echo strpos($mensaje, '✅') !== false ? 'exito' : ''; ?>">
            <?php echo $mensaje; ?>
        </p>
    <?php endif; ?>
    
    <form method="POST" action="">
        <label for="password">Nueva contraseña:</label>
        <input type="password" name="password" id="password" required 
               placeholder="Ingresa tu nueva contraseña" minlength="6">
        
        <button type="submit">Cambiar contraseña</button>
    </form>
  </div>
</body>
</html>