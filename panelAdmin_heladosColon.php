<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo CFE</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Panel Administrativo Helados Colon</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">
                <p>¡Bienvenido al Panel Administrativo de Helados Colon! Nos complace darte la bienvenida a la plataforma donde podrás gestionar de manera eficiente y eficaz todas las operaciones relacionadas con el suministro de la empresa. En este panel encontrarás todas las herramientas necesarias para la gestionar a sus empleados, productos vigentes e inventario actual.</p>
                <img src="./img/logo_colon.png" class="logopaneladmin">
                <br><br>
            </div>
            <br><br>
        </div>
    </div>

</body>

</html>