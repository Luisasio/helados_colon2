<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos del Administrador</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Editar datos del administrador</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 ">
                <div class="centrar">
                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="administradores.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <?php
                require "conexion.php";
                $id = $_GET['id'];

                $vernoticia = "SELECT * FROM administradores WHERE id_admin = '$id'";
                $resultado = mysqli_query($conectar, $vernoticia);

                $fila = $resultado->fetch_array();

                ?>

                <div class="ancho contenedor6">
                    <form action="actualizar_admin.php" method="POST" autocomplete="off">
                        <p class="negritas">Edite los campos de su elección:</p>

                        <input value="<?php echo $fila['nombre']; ?>" class="campos_login" type="text" placeholder="Nombre Completo" name="nombre" required>
                        <br><br>

                        <input value="<?php echo $fila['correo']; ?>" class="campos_login" type="text" placeholder="Correo Electronico" name="" disabled>
                        <br><br>

                        <input value="<?php echo $fila['fecha_nacimiento']; ?>" class="campos_login" type="date" name="fecha_nacimiento" required>
                        <br><br>

                        <input value="<?php echo $fila['telefono']; ?>" class="campos_login" type="text" placeholder="Número de teléfono" name="telefono" maxlength="9" required>
                        <br><br>

                        <input type="hidden" name="id" value="<?php echo $fila['id_admin']; ?>">
                        <input type="hidden" name="contrasena" value="<?php echo $fila['contrasena']; ?>">
                        <input type="hidden" name="correo" value="<?php echo $fila['correo']; ?>">

                        <input type="submit" value="Editar" class="registrar_admin">
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