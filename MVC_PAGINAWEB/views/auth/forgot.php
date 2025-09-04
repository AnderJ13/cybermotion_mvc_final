<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['correo'])) {
    $codigo = rand(100000, 999999);
    $_SESSION['codigo_recuperacion'] = $codigo;
    echo "<script>
        alert('Tu código de recuperación es: $codigo');
        window.location.href = 'verificacion.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar contraseña</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .forgot-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px gray;
      width: 300px;
      text-align: center;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background: #28a745;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #1e7e34;
    }
  </style>
</head>
<body>
  <div class="forgot-box">
    <h2>Recuperar Contraseña</h2>
    <form action="verificacion.php" method="POST">
      <input type="email" name="correo" placeholder="Ingrese su correo" required>
      <button type="submit">Enviar enlace</button>
    </form>
    <a href="/MVC_PAGINAWEB/views/auth/verificacion.php"></a>
    <a href="/MVC_PAGINAWEB/views/auth/login.php">← Volver al login</a>

  </div>
</body>
</html>
