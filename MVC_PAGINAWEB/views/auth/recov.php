<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if ($email == "prueba@correo.com") {
        // Generar un código aleatorio de 6 dígitos
        $codigo = rand(100000, 999999);
        echo "<script>alert('Correo encontrado. Tu código de recuperación es: $codigo');</script>";
    } else {
        echo "<script>alert('Correo no registrado.');</script>";
    }
}
?>