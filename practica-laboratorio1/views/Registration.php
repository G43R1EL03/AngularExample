<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/practica-laboratorio1/style/Styles.css">
    <title>Registro</title>
</head>
<body>
    <section class="img_body">
        <div class="container">
            <form id="registerForm" action="index.php?action=register-user" method="POST">
                <div style="color: red; text-align: center; font-weight: bold;">
                    <?php
                        if (isset($error)) {
                            echo $error;
                        }
                    ?>
                </div>
                <h2>Registro</h2>
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit"><strong>Registrarse</strong></button><br><hr><br>

                <p>¿Ya tienes una cuenta? <a href="index.php?action=login">Iniciar Sesión</a></p>
            </form>
        </div>
    </section>
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="messageText"></p>
        </div>
    </div>
    <script src="script.js"></script>
    <?php
        include("controllers/AuthController.php");
    ?>
</body>
</html>
