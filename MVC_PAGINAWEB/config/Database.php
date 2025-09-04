<?php
class Database {
    private $host = "localhost";
    private $db_name = "cybermotion_db"; 
    private $username = "root";
    private $password = "";
    public $conn; // ← Esta es la propiedad que debes usar

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }
    
    // NO hay método getConnection(), se usa directamente $database->conn
}
?>