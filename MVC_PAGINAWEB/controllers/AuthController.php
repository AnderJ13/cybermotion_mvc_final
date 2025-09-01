<?php
require_once '../models/User.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->model->register(
                $_POST['nombre'],
                $_POST['email'],
                $_POST['telefono'],
                $_POST['password']
            );
            
            if ($success) {
                header("Location: /MVC_PAGINAWEB/public/?action=login&registered=1");
                exit();
            } else {
                header("Location: /MVC_PAGINAWEB/public/?action=register&error=1");
                exit();
            }
        } else {
            require '../views/auth/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->model->login($_POST['email'], $_POST['password']);
            
            if ($user) {
                session_start();
                $_SESSION['usuario_id'] = $user['id'];
                $_SESSION['usuario_nombre'] = $user['nombre'];
                $_SESSION['usuario_email'] = $user['email'];
                
                header("Location: /MVC_PAGINAWEB/public/?action=principal");
                exit();
            } else {
                header("Location: /MVC_PAGINAWEB/public/?action=login&error=1");
                exit();
            }
        }
        require '../views/auth/login.php';
    }

   public function logout() {
    // No necesitas session_start() aquí
    
    // Limpia todas las variables de sesión
    $_SESSION = [];
    
    // Borra la cookie de sesión
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(), 
            '', 
            time() - 42000,
            $params["path"], 
            $params["domain"],
            $params["secure"], 
            $params["httponly"]
        );
    }
    
    // Destruye la sesión
    session_destroy();
    
    // Redirección
    header("Location: /MVC_PAGINAWEB/public/?action=principal");
    exit();
}
}