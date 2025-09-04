<?php
// Iniciar sesión al principio de todo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../controllers/AuthController.php';
require_once '../controllers/PageController.php';

require_once '../controllers/AuthController.php';
require_once '../controllers/PageController.php';

$action = $_GET['action'] ?? 'home';

$authController = new AuthController();
$pageController = new PageController();

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'principal':
        $pageController->principal();
        break;
    case 'home':
    default:
        $pageController->home();
}
?>