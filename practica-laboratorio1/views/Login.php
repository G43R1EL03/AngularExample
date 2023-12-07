<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/practica-laboratorio1/style/Styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <section class="img_body">
        <div class="container">
            <form id="loginForm" action="index.php?action=auth" method="POST">
                <div style="color: red; text-align: center; font-weight: bold;">
                    <?php
                        if (isset($error)) {
                            echo $error;
                        }
                    ?>
                </div>
                <h2>Iniciar Sesión</h2><br>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit"><strong>Iniciar Sesión</strong></button><br><hr><br>

                <p>¿No tienes una cuenta? <a href="index.php?action=register">Regístrate</a></p>
            </form>
        </div>
    </section>
    <script src="script.js"></script>
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="messageText"></p>
        </div>
    </div>
</body>
</html>
