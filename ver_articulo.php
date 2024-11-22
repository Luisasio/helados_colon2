<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos completos del Empleado</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Datos del articulo seleccionado</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">

                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="inventario.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>

                <?php
                require "conexion.php";
                $id_articulo = $_GET['id_articulo'];

                $verusuario = "SELECT * FROM articulos WHERE id_articulo = '$id_articulo'";
                $resultado = mysqli_query($conectar, $verusuario);

                $fila = $resultado->fetch_array();

                ?>

                <div class="contenedor7">
                    <h3>Nombre del articulo:</h3>
                    <p><?php echo $fila["nombre_articulo"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Imagen del articulo:</h3>
                    <img src="<?php echo $fila["imagen"]; ?>" class="imagen_articulo_ver">
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Cantidad del articulo:</h3>
                    <p><?php echo $fila["cantidad"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Descripcion del articulo:</h3>
                    <p><?php echo $fila["descripcion"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Proveedor:</h3>
                    <p><?php echo $fila["proveedor"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Numero del proveedor:</h3>
                    <p><?php echo $fila["numero_proveedor"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Cantidad minima del articulo antes de solicitar un nuevo lote:</h3>
                    <p>5</p>
                    <hr>
                </div>
                <br>
            </div>
            <br>
        </div>

</body>

</html>