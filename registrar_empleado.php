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
                <h1>Registrar a un Empleado</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 ">
                <div class="centrar">
                    <img src="./img/logo_colon.png" class="logopaneladmin1">
                    <br><br>
                    <a href="empleados.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <div class="ancho contenedor6">
                    <form action="guardar_empleado.php" method="POST" autocomplete="off">
                        <p class="negritas">Porfavor, llene los siguientes campos:</p>

                        <input class="campos_login" type="text" placeholder="Nombre Completo" name="nombre_empleado" required>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Correo Electronico" name="correo_empleado" required>
                        <br><br>

                        <label class="negritas">Fecha de nacimiento:</label><br><br>

                        <input class="campos_login" type="date" name="fecha_nacimiento_empleado" required>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Número de teléfono" name="telefono_empleado" maxlength="9" required>
                        <br><br>

                        <label class="negritas">Dias de trabajo:</label><br><br>

                        <input type="checkbox" value="Lunes" name="dias_trabajo[]"> <span>Lunes</span>

                        <input type="checkbox" value="Martes" name="dias_trabajo[]"> <span>Martes</span>

                        <input type="checkbox" value="Miercoles" name="dias_trabajo[]"> <span>Miércoles</span>

                        <input type="checkbox" value="Jueves" name="dias_trabajo[]"> <span>Jueves</span>

                        <input type="checkbox" value="Viernes" name="dias_trabajo[]"> <span>Viernes</span>
                        <br><br>

                        <label class="negritas">Turno del empleado:</label><br><br>

                        <input required type="radio" value="Vespertino: 9:00 A.M. - 4:00 P.M." name="horas_trabajo"> <span>Vespertino: 9:00 A.M. - 4:00 P.M.</span>
                        <br><br>

                        <input required type="radio" value="Matutino: 5:00 P.M - 12:00 A.M" name="horas_trabajo"> <span>Matutino: 5:00 P.M - 12:00 A.M</span>
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