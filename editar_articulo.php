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
                <h1>Editar Articulos</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 ">
                <div class="centrar">
                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="inventario.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>
                <?php
                require "conexion.php";
                $id_articulo = $_GET['id_articulo'];

                $verarticulo = "SELECT * FROM articulos WHERE id_articulo = '$id_articulo'";
                $resultado = mysqli_query($conectar, $verarticulo);

                $fila = $resultado->fetch_array();
                ?>
                <div class="ancho contenedor6">
                    <form action="actualizar_articulo.php" method="POST" enctype="multipart/form-data">
                        <p class="negritas">Porfavor ingrese la nueva cantidad de producto</p>

                        <input class="campos_login" type="text" placeholder="Nombre del articulo"  required value="<?php echo $fila["nombre_articulo"]?>" disabled>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Cantidad" name="cantidad" required value="<?php echo $fila["cantidad"]?>" >
                        <br><br>

                        <textarea  class="campos_login" placeholder="Descripción" disabled><?php echo $fila["descripcion"]?></textarea>
                        <br><br>

                        <br><br>
                        <input type="hidden" name="id_articulo" class="campos_login" value="<?php echo $fila["id_articulo"]?>">

                        <input type="submit" value="Registrar nueva cantidad" class="registrar_admin">
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