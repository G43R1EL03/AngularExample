<?php
class User {
    private $conn;
    private $table = 'usuario';

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;

    public function __construct() {
        // Constructor vacío, no se necesita conexión a la base de datos aquí.
    }

    public static function create($db, $nombre, $apellido, $email, $password) {
        $table = 'usuario';
        $query = 'INSERT INTO ' . $table . ' (nombre, apellido, email, password) VALUES (:nombre, :apellido, :email, :password)';
        $stmt = $db->prepare($query);

        $nombre = htmlspecialchars(strip_tags($nombre));
        $apellido = htmlspecialchars(strip_tags($apellido));
        $email = htmlspecialchars(strip_tags($email));

        // Cifrar la contraseña antes de almacenarla en la base de datos
        $password = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public static function findByEmail($db, $email) {
        $table = 'usuario';
        $query = "SELECT * FROM " . $table . " WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }    
/*
    public static function updateAuthToken($userId, $token) {
        $query = "UPDATE users SET auth_token = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $token, $userId);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    public static function validateAuthToken($userId, $token) {
        $query = "SELECT auth_token FROM users WHERE id = ?";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedToken = $row['auth_token'];
    
            return hash_equals($storedToken, $token);
        }
    
        return false;
    }
   */ 
    
}
?>
