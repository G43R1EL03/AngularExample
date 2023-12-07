<?php
require_once 'models/User.php';
require_once 'config/database.php';
require 'libs/PasswordHash.php';

class AuthController {
    public function login() {
        if (isset($_SESSION['user_id'])) {
            // Si el usuario ya está autenticado, redirige a la página principal o a donde sea necesario.
            header("Location: Welcome.php");
            exit;
        } else {
            // Muestra la página de inicio de sesión
            require 'views/Login.php';
        }
    }
    
    public function register() {
        if (isset($_SESSION['user_id'])) {
            // Si el usuario ya está autenticado, redirige a la página principal o a donde sea necesario.
            header("Location: Login.php");
            exit;
        } else {
            // Muestra la página de registro
            require 'views/Registration.php';
        }
    }

    public function authenticate() {
        $database = new Database();
        $db = $database->connect();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Validar datos de inicio de sesión
            if (empty($email) || empty($password)) {
                $error = "Correo y contraseña son obligatorios";
                require 'views/Login.php';
                return;
            }
    
            // Buscar al usuario por su dirección de correo electrónico
            $user = User::findByEmail($db, $email);
    
            if ($user && PasswordHash::verifyPassword($password, $user['password'])) {
                // Usuario autenticado

                session_start();
                // Guarda los datos del usuario en la sesión
                $_SESSION['user'] = $user;

                header("Location: views/Welcome.php"); // Redirige al usuario después de iniciar sesión.
                exit;
            } else {
                // Credenciales incorrectas, muestra un mensaje de error
                $error = "Credenciales incorrectas";
                require 'views/Login.php';
            }
        }
    }
    
    
    public function logout() {
        // Cerrar la sesión
        session_start();
        session_destroy();
        echo "Sesión destruida";
        header("Location: index.php?action=login");
        exit;

    }
    
    

    public function registerUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $database = new Database();
            $db = $database->connect();
    
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Verificar si el correo electrónico ya existe en la base de datos
            $userData = User::findByEmail($db, $email);
    
            if ($userData) {
                // El correo electrónico ya está registrado.
                $error = "El correo electrónico ya está en uso.";
                require 'views/Registration.php';
                return;
            }
    
            // Validar datos de registro
            if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
                $error = "Todos los campos son obligatorios.";
                require 'views/Registration.php';
                return;
            }
    
            // Cifrar la contraseña
            $hashedPassword = PasswordHash::hashPassword($password);
    
            // Crear una instancia del modelo User y guardar en la base de datos
            $user = new User($db);
            $user->nombre = $nombre;
            $user->apellido = $apellido;
            $user->email = $email;
            $user->password = $hashedPassword;
    
            if (User::create($db, $nombre, $apellido, $email, $password)) {
                // Registro exitoso, redirige al usuario a la página de inicio de sesión
                $acierto = "Registro Exitoso";

                header("Location: index.php?action=login");
                
                require 'views/Registration.php';
                exit;
            } else {
                // Ocurrió un error, muestra un mensaje de error
                $error = "Error en el registro.";
                require 'views/Registration.php';
            }

        }
    }
    

    public function editProfile() {
        // Recuperar datos del usuario desde la sesión
        session_start();
        if (!isset($_SESSION['user'])) {
            // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
            header("Location: index.php?action=login");
            exit;
        }
    
        $user = $_SESSION['user'];
    
        // Verificar si se envió el formulario de edición
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recuperar los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $distrito = $_POST['distrito'];
            $provincia = $_POST['provincia'];
    
            // Validar y actualizar los campos en la base de datos
            // (debes implementar lógica para validar y actualizar los campos en tu base de datos)
    
            // Subir nueva foto de perfil (si se proporcionó una)
            if ($_FILES['foto']['name']) {
                // Procesar y subir la foto (debes implementar esta funcionalidad)
            }
    
            // Redirigir al usuario a la página de perfil o a donde desees
            header("Location: index.php?action=profile");
            exit;
        }
    
        // Mostrar el formulario de edición de perfil
        require 'views/EditProfile.php';
    }
    
    
}
?>
