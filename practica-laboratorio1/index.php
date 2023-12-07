<?php
require_once 'controllers/AuthController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$authController = new AuthController();

if ($action === 'login') {
    $authController->login();
} elseif ($action === 'register') {
    $authController->register();
} elseif ($action === 'logout') {
    $authController->logout();
} elseif ($action === 'auth') {
    $authController->authenticate();
} elseif ($action === 'register-user') {
    $authController->registerUser();
} elseif ($action === 'dashboard') {
    // Verificar si el usuario ha iniciado sesión y tiene un token válido
    session_start();
    if (isset($_SESSION['user_id']) && isset($_SESSION['auth_token'])) {
        $userId = $_SESSION['user_id'];
        $authToken = $_SESSION['auth_token'];

        if (User::validateAuthToken($userId, $authToken)) {
            // El usuario tiene un token de autenticación válido, puede acceder al panel de control
            $authController->dashboard();
        } else {
            // Token de autenticación no válido, redirigir al inicio de sesión
            header("Location: index.php?action=login");
            exit;
        }
    } else {
        // El usuario no ha iniciado sesión, redirigir al inicio de sesión
        header("Location: index.php?action=login");
        exit;
    }
}
?>
