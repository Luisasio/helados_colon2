<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administrador</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Registrar a un Administrador</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 ">
                <div class="centrar">
                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="administradores.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <div class="ancho contenedor6">
                    <form action="guardar_admin_panel_admin.php" method="POST" autocomplete="off">
                        <p class="negritas">Porfavor, llene los siguientes campos:</p>

                        <input class="campos_login" type="text" placeholder="Nombre Completo" name="nombre" required>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Correo Electronico" name="correo" required>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Contraseña" name="contrasena" required>
                        <br><br>

                        <label class="negritas">Fecha de nacimiento:</label><br><br>

                        <input class="campos_login" type="date" name="fecha_nacimiento" required>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Número de teléfono" name="telefono" maxlength="9" required>
                        <br><br>

                        <input type="submit" value="Registrar" class="registrar_admin">
                        <br><br>
                        <hr>
                    </form>
                </div>
                <br><br>
            </div>
            <br>
        </div>

</body>

</html>