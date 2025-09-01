<?php
require_once '../config/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($nombre, $email, $telefono, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->conn->prepare("INSERT INTO usuarios (nombre, email, telefono, password_hash) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $email, $telefono, $hashed_password]);
    }

    public function login($email, $password) {
        $stmt = $this->db->conn->prepare("SELECT id, nombre, password_hash FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password_hash'])) {
                return $user;
            }
        }
        return false;
    }
}
// Nota: No debe haber ninguna llave '}' adicional aquí
?>