<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $codigo = rand(100000, 999999);
    echo "<script>alert('Tu código de recuperación es: $codigo');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <title>Document</title>
</head>
<body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="recov.php" method="POST">
    <h1>CYBERMOTION</h1>
    <h2 class="h3 mb-3 fw-normal">Por favor, inicia sesión</h2>
    <div class="form-floating my-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="" name="email">
      <label for="floatingInput">Correo electrónico</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Recuperar contraseña</button>
  </form>

</main>

<style>body {
  background: linear-gradient(135deg, #fff, #fff, #fff);
  color: #fff;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Contenedor del formulario */
.form-signin {
  background-color: rgba(0, 0, 0, 0.6);
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
  max-width: 400px;
}

/* Títulos */
.form-signin h1 {
  font-size: 2rem;
  font-weight: bold;
  color: #00b4d8;
  margin-bottom: 1rem;
}

.form-signin h2 {
  font-size: 1.2rem;
  margin-bottom: 1.5rem;
  color: #dee2e6;
}

/* Inputs */
.form-control {
  background-color: #1b263b;
  border: 1px solid #415a77;
  color: #fff;
  border-radius: 0.5rem;
}

.form-control:focus {
  border-color: #00b4d8;
  box-shadow: 0 0 5px #00b4d8;
  background-color: #1b263b;
  color: #fff;
}

label {
  color: #adb5bd;
}

/* Botón */
.btn-primary {
  background-color: #00b4d8;
  border: none;
  border-radius: 0.5rem;
  font-weight: bold;
  transition: 0.3s;
}

.btn-primary:hover {
  background-color: #61ccf0ff;
  transform: scale(1.02);
}
</style>


    
  </body>
</html>