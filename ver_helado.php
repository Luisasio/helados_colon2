<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos completos del helado</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Datos completos del Helado</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">

                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="insumos.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>

                <?php
                require "conexion.php";
                $id = $_GET['id'];

                $verusuario = "SELECT * FROM helados WHERE id_helados = '$id'";
                $resultado = mysqli_query($conectar, $verusuario);

                $fila = $resultado->fetch_array();

                ?>

                <div class="contenedor7">
                    <h3>Nombre del helado:</h3>
                    <p><?php echo $fila["helado"]; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Descripcion del helado:</h3>
                    <p><?php echo $fila["descripcion"]; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Foto del helado:</h3>
                    <img src="<?php echo $fila['ruta']; ?>" class="foto_helados">
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Precio:</h3>
                    <p><?php echo $fila["precio"]; ?></p>
                    <hr>
                </div>
                <br>
            </div>
            <br>
        </div>

</body>

</html>