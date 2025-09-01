<?php
class PageController {
    public function home() {
        session_start();
        $usuario = $_SESSION['usuario'] ?? null;
        require '../views/pages/home.php';
    }

    public function principal() {
        require '../views/pages/principal.php';
    }
}
?>