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
                <h1>Datos completos del Administrador</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">

                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="empleados.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>

                <?php
                require "conexion.php";
                $id = $_GET['id'];

                $verusuario = "SELECT * FROM empleados WHERE id_empleado = '$id'";
                $resultado = mysqli_query($conectar, $verusuario);

                $fila = $resultado->fetch_array();

                ?>

                <div class="contenedor7">
                    <h3>Nombre completo:</h3>
                    <p><?php echo $fila["nombre_empleado"]; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Correo electronico:</h3>
                    <p><?php echo $fila["correo_empleado"]; ?></p>
                    <hr>
                </div>

                <?php
                    $fechanormal = $fila["fecha_nacimiento_empleado"];
                    $fechacambiada = str_replace('-', '/', date('d-m-Y', strtotime($fechanormal)));
                ?>

                <div class="contenedor7">
                    <h3>Fecha de nacimiento:</h3>
                    <p><?php echo $fechacambiada; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Teléfono:</h3>
                    <p><?php echo $fila["telefono_empleado"]; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Días de trabajo:</h3>
                    <p><?php echo $fila["dias_trabajo"]; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Turno del empleado:</h3>
                    <p><?php echo $fila["horas_trabajo"]; ?></p>
                    <hr>
                </div>
                <br>
            </div>
            <br>
        </div>

</body>

</html>