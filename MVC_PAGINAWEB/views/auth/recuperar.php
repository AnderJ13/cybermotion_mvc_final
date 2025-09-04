<?php
session_start();
// recuperar.php - Formulario para ingresar el correo
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña - CIBERMOTION</title>
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
    .recover-box { 
        background: rgba(255,255,255,0.95);
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 8px 32px 0 rgba(31,28,44,0.2);
        width: 350px;
        text-align: center;
    }
    .recover-box h2 {
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
    .icon-envelope {
        font-size: 2.5rem;
        color: #6a679e;
        margin-bottom: 18px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <div class="recover-box">
    <div class="icon-envelope"><i class="fa-solid fa-envelope"></i></div>
    <h2>Recuperar Contraseña</h2>
    <p style="color: #666; margin-bottom: 20px;">Ingresa tu correo electrónico para recibir el código de verificación</p>
    
    <form method="POST" action="verificacion.php">
      <input type="email" name="correo" placeholder="correo@ejemplo.com" required>
      <button type="submit">Enviar código</button>
    </form>
    
    <a href="login.php" style="display: block; margin-top: 20px; color: #6a679e; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Volver al login
    </a>
  </div>
</body>
</html>