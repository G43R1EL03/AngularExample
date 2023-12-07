<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: ../index.php?action=login");
    exit;
}

$user = $_SESSION['user'];

// Puedes personalizar el mensaje de bienvenida según los datos del usuario
$welcomeMessage = "¡Bienvenido, " . $user['nombre'] . " " . $user['apellido'] . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/practica-laboratorio1/style/Styles.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="h_nav-bar">
            <div class="perfil">
                <img src="../img/usuario.png" alt="Perfil">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="Welcome.php">Home</a></li>
                    <li><a href="EditProfile.php">Edit Profile</a></li>
                </ul>            
            </nav>
            <a class="nav_btn" href="../index.php?action=logout"><button>logout</button></a>
            
        </div>
        <div class="header">
            <div class="info">
                <div class="meta">
                    <a  href="#" class="author"></a><br>
                </div>
                <h1><?php echo $welcomeMessage; ?></h1>
            </div>
            <div style="color: red; text-align: center; font-weight: bold;">
                <?php
                    if (isset($error)) {
                        echo $error;
                    }
                ?>
            </div>
        </div>
    </header>
</body>
</html>
