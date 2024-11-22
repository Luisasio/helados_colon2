<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario | articulos</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Articulos de Helados Colon</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">
                <p>Esta sección permite gestionar los inventarios de los articulos del sistema.
                la demas descripcion queda pendiente.
                </p>

                <a href="registrar_articulo.php" class="btn_registrar_admin_2">Registrar Nuevo articulo</a>
                <br><br>

                <table class="centrar">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del articulo</th>
                        <th>Imagen</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <tr>
                        <?php
                        require "conexion.php";
                        $todos_datos = "SELECT * FROM articulos ORDER BY id_articulo ASC";
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>

                    <tr>
                        <td><?php echo $fila["id_articulo"] ?></td>
                        <td><?php echo $fila["nombre_articulo"] ?></td>
                        <td><img src="<?php echo $fila["imagen"] ?>" class="imagen_articulo_tabla"></td>
                        <td><a href="ver_articulo.php?id_articulo=<?php echo $fila['id_articulo']; ?>"><img src="./img/icono_ver.png" class="icono_tabla_admin"></a></td>
                        <td><a href="editar_articulo.php?id_articulo=<?php echo $fila['id_articulo']; ?>"><img src="./img/icono_editar.png" class="icono_tabla_admin"></a></td>
                        <td><a href="#" onclick="validar('eliminar_articulo.php?id_articulo=<?php echo $fila['id_articulo']; ?>')"><img src="./img/icono_eliminar.png" class="icono_tabla_admin"></a></a></td>
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