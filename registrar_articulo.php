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
                <h1>Registrar Articulos</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 ">
                <div class="centrar">
                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="inventario.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <div class="ancho contenedor6">
                    <form action="guardar_articulo.php" method="POST" enctype="multipart/form-data">
                        <p class="negritas">Porfavor, llene los siguientes campos:</p>

                        <input class="campos_login" type="text" placeholder="Nombre del articulo" name="nombre_articulo" required>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Cantidad" name="cantidad" oninput="validarNumerico(this)" required>
                        <br><br>

                        <textarea name="descripcion" class="campos_login" placeholder="Descripción"></textarea>
                        <br><br>

                        <input type="file" name="imagen" class="campos_login" >
                        <br><br>

                        <select name="proveedor" class="campos_login" required>
                            <option value="">Seleccione un proveedor</option>
                            <option value="Reyma">Reyma</option>
                            <option value="Jaguar">Jaguar</option>
                        </select>
                        <br><br>

                        <select name="numero_proveedor" class="campos_login" required>
                            <option value="">Seleccione el numero del proveedor</option>
                            <option value="9999345500">9999345500</option>
                            <option value="9056431243">9056431243</option>
                        </select>
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
        <script>
        function validarNumerico(input) {
             input.value = input.value.replace(/[^0-9]/g, ''); // Remueve cualquier carácter que no sea numérico
        }
        </script>
</body>

</html>