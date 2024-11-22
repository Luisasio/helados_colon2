<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos del empleado</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Editar Empleado</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 ">
                <div class="centrar">
                    <img src="./img/logo_colon.png" class="logopaneladmin1">
                    <br><br>
                    <a href="empleados.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <?php
                require "conexion.php";
                $id = $_GET['id'];

                $vernoticia = "SELECT * FROM empleados WHERE id_empleado = '$id'";
                $resultado = mysqli_query($conectar, $vernoticia);

                $fila = $resultado->fetch_array();

                // Convertir la cadena de texto "dias_trabajo" en un array
                $dias_trabajo_guardados = explode(",", $fila['dias_trabajo']);
                ?>

                <div class="ancho contenedor6">
                    <form action="actualizar_empleados.php" method="POST" autocomplete="off">
                        <p class="negritas">Porfavor, llene los siguientes campos:</p>

                        <input value="<?php echo $fila['nombre_empleado']; ?>" class="campos_login" type="text" placeholder="Nombre Completo" name="nombre_empleado" required>
                        <br><br>

                        <input value="<?php echo $fila['correo_empleado']; ?>" class="campos_login" type="text" placeholder="Correo Electronico" name="correo_empleado" required>
                        <br><br>

                        <label class="negritas">Fecha de nacimiento:</label><br><br>

                        <input value="<?php echo $fila['fecha_nacimiento_empleado']; ?>" class="campos_login" type="date" name="fecha_nacimiento_empleado" required>
                        <br><br>

                        <input value="<?php echo $fila['telefono_empleado']; ?>" class="campos_login" type="text" placeholder="Número de teléfono" name="telefono_empleado" maxlength="9" required>
                        <br><br>

                        <label class="negritas">Dias de trabajo:</label><br><br>

                        <!-- Mostrar los checkbox preseleccionados si los valores están en el array $dias_trabajo_guardados -->
                        <input type="checkbox" value="Lunes" name="dias_trabajo[]" <?php if (in_array("Lunes", $dias_trabajo_guardados)) echo 'checked'; ?>> <span>Lunes</span>
                        <input type="checkbox" value="Martes" name="dias_trabajo[]" <?php if (in_array("Martes", $dias_trabajo_guardados)) echo 'checked'; ?>> <span>Martes</span>
                        <input type="checkbox" value="Miercoles" name="dias_trabajo[]" <?php if (in_array("Miercoles", $dias_trabajo_guardados)) echo 'checked'; ?>> <span>Miércoles</span>
                        <input type="checkbox" value="Jueves" name="dias_trabajo[]" <?php if (in_array("Jueves", $dias_trabajo_guardados)) echo 'checked'; ?>> <span>Jueves</span>
                        <input type="checkbox" value="Viernes" name="dias_trabajo[]" <?php if (in_array("Viernes", $dias_trabajo_guardados)) echo 'checked'; ?>> <span>Viernes</span>
                        <br><br>

                        <label class="negritas">Turno del empleado:</label><br><br>

                        <input <?php if ($fila['horas_trabajo'] == 'Vespertino: 9:00 A.M. - 4:00 P.M.') echo 'checked'; ?> required type="radio" value="Vespertino: 9:00 A.M. - 4:00 P.M." name="horas_trabajo"> <span>Vespertino: 9:00 A.M. - 4:00 P.M.</span>
                        <br><br>

                        <input <?php if ($fila['horas_trabajo'] == 'Matutino: 5:00 P.M - 12:00 A.M') echo 'checked'; ?> required type="radio" value="Matutino: 5:00 P.M - 12:00 A.M" name="horas_trabajo"> <span>Matutino: 5:00 P.M - 12:00 A.M</span>
                        <br><br>

                        <input type="hidden" name="id" value="<?php echo $fila['id_empleado']; ?>">

                        <input type="submit" value="Editar" class="registrar_admin">
                        <br><br>
                        <hr>
                    </form>
                </div>

            </div>
            <br><br>
        </div>
        <br>
    </div>

</body>

</html>