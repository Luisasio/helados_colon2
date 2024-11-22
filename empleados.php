<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Empleados de Helados Colon</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">
                <p>Esta sección permite gestionar a todos los empleados del sistema.
                Puedes ver su información detallada, como horas de trabajo, datos de contacto, editar su información o eliminarlos si es necesario, todo de manera rápida y sencilla para mantener un control eficiente del personal.
                </p>

                <a href="registrar_empleado.php" class="btn_registrar_admin_2">Registrar Empleado</a>
                <br><br>

                <table class="centrar">
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Teléfono</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <tr>
                        <?php
                        require "conexion.php";
                        $todos_datos = "SELECT * FROM empleados ORDER BY id_empleado ASC";
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>

                    <tr>
                        <td><?php echo $fila["id_empleado"] ?></td>
                        <td><?php echo $fila["nombre_empleado"] ?></td>
                        <td><?php echo $fila["correo_empleado"] ?></td>
                        <td><a href="ver_empleado.php?id=<?php echo $fila['id_empleado']; ?>"><img src="./img/icono_ver.png" class="icono_tabla_admin"></a></td>
                        <td><a href="editar_empleado.php?id=<?php echo $fila['id_empleado']; ?>"><img src="./img/icono_editar.png" class="icono_tabla_admin"></a></td>
                        <td><a href="#" onclick="validar('eliminar_empleado.php?id=<?php echo $fila['id_empleado']; ?>')"><img src="./img/icono_eliminar.png" class="icono_tabla_admin"></a></a></td>
                    </tr>
                <?php
                        }
                ?>
                </table>
                <br>
            </div>
            <br>
        </div>
    </div>

    <script>
        function validar(url) {
            var eliminar = confirm("¿Realmente desea eliminar a este empleado?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
    </div>
    <br><br>
    </div>
    </div>

</body>

</html>