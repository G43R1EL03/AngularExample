<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/practica-laboratorio1/style/Styles.css">
    <title>Editar Perfil</title>
</head>
<body>
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
    <section class="img_body">
        <div class="container">
            <form action="index.php?action=update-profile" method="post" enctype="multipart/form-data">
                <div style="color: red; text-align: center; font-weight: bold;">
                    <?php
                        if (isset($error)) {
                            echo $error;
                        }
                    ?>
                </div>
                <h2>Editar Perfil</h2><br>
                <div class="meta">
                    <label for="file-input" class="author_e"></label>
                    <input id="file-input" type="file" name="foto">
                </div>
                <br>
                <input type="text" name="nombre" >
                <input type="text" name="apellido" >
                <input type="email" name="email" >
                <input type="password" name="password" placeholder="Contraseña" >
                <input type="text" name="distrito" >
                <input type="text" name="provincia" ><br>
                <button type="submit"><strong>Guardar Cambios</strong></button><br>
            </form>
        </div>
    </section>
</body>
</html>
