<?php
 session_start();

 if (isset($_SESSION['autentificado']) == "SI") { {
         header("Location: panelAdmin_heladosColon.php");
     }
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="style_panel_admin.css">
</head>

<body>
    <div class="ancho centrar">
        <img class="logo_colon" src="./img/logo_colon.png">
    </div>

    <div class="ancho centrar">
        <div class="contenedor1">
            <form action="autentificar_login.php" method="POST">
                <br><br>
                <h1>Panel Administrativo</h1>

                <?php
                $errorusuario = isset($_GET["errorusuario"]);
                $noexisteusuario = isset($_GET["noexisteusuario"]);
                if ($errorusuario == "SI") {
                    echo '<h3 class="avisoerror">Datos incorrectos</h3>';
                }
                if ($noexisteusuario == "SI") {
                    echo '<h3 class="avisoerror">No existe este usuario</h3>';
                }
                ?>

                <input class="campos_login" type="text" placeholder="Correo electronico" name="correo">
                <br><br>

                <input class="campos_login" type="password" placeholder="Contraseña" name="contrasena">
                <br><br>

                <input type="submit" value="Iniciar Sesión" class="btn_iniciar_sesion">
                <br><br>
                <hr>
                <br>
            </form>
            <!-- <a href="registrar_admin.php" class="btn_registrar_admin">Registrar Administrador</a>
            <br><br> -->
        </div>

        <div class="ancho contenedor2">
            <p>© Helados Colon. Todos los derechos reservados.</p>
        </div>

    </div>
</body>

</html>