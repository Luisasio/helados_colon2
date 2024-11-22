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
                <p>Esta sección permite gestionar los helados de los articulos del sistema.
              Se podrá ver, editar, eliminar y resgistrar nuevos helados.
                </p>

                <a href="registrar_insumo.php" class="btn_registrar_admin_2">Registrar Nuevo Insumo</a>
                <br><br>

                <table class="centrar">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Helado</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <tr>
                        <?php
                        require "conexion.php";
                        $todos_datos = "SELECT * FROM helados ORDER BY id_helados ASC";
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>

                    <tr>
                        <td><?php echo $fila["id_helados"] ?></td>
                        <td><?php echo $fila["helado"] ?></td>
                        <td><img src="<?php echo $fila['ruta']; ?>" class="foto_helados"></td>
                        <td><?php echo $fila["descripcion"] ?></td>
                        <td>$<?php echo $fila["precio"] ?></td>
                        <td><a href="ver_helado.php?id=<?php echo $fila['id_helados']; ?>"><img src="./img/icono_ver.png" class="icono_tabla_admin"></a></td>
                        <td><a href="editar_helado.php?id=<?php echo $fila['id_helados']; ?>"><img src="./img/icono_editar.png" class="icono_tabla_admin"></a></td>
                        <td><a href="#" onclick="validar('eliminar_helados.php?id=<?php echo $fila['id_helados']; ?>')"><img src="./img/icono_eliminar.png" class="icono_tabla_admin"></a></a></td>
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
            var eliminar = confirm("¿Realmente desea eliminar este helado?");
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