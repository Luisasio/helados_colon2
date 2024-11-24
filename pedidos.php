<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="style_panel_admin.css">
    <script src="https://kit.fontawesome.com/fe8b02346c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Seguimiento de pedidos</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">
                <p>En esta sección podrás visualizar todos los pedidos generados por los clientes en tiempo real. Consulta los detalles de cada pedido, incluyendo los productos solicitados, el estado de preparación y la información del cliente. Mantén un control eficiente de los pedidos para asegurar un servicio rápido y preciso.
                </p>

                <table class="centrar">
                    <tr>
                        <th>ID del pedido</th>
                        <th>Nombre del cliente</th>
                        <th>Ver</th>
                        <th>Ver Ticket</th>
                        <th>Confirmar pedido</th>
                    </tr>
                    <tr>
                        <?php
                        require "conexion.php";
                        $todos_datos = "SELECT * FROM pedidos ORDER BY id_pedido ASC";
                        $resultado = mysqli_query($conectar, $todos_datos);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>

                    <tr>
                        <td><?php echo $fila["id_pedido"] ?></td>
                        <td><?php echo $fila["nombre_cliente_pedido"] ?></td>
                        <td><a href="ver_pedido.php?id=<?php echo $fila['id_pedido']; ?>"><img src="./img/icono_ver.png" class="icono_tabla_admin"></a></td>
                        <td><a href="ver_ticket.php?id=<?php echo $fila['id_pedido']; ?>"><i class="fa-solid fa-file-invoice ticket"></i></a></td>
                        <td><a href="#" onclick="validar('eliminar_pedido.php?id=<?php echo $fila['id_pedido']; ?>')"><img src="./img/icono_confirmar.png" class="icono_tabla_admin"></a></a></td>
                    </tr>
                <?php
                        }
                ?>
                </table><br><br>
                <div class="botonpdfposicion">
                <a href="reporte.php" class="boton_pdf"><img src="./img/icono_pdf.png" alt="" class="icono_tabla_admin"></a>  
                </div>
                <br>
            </div>
            <br>
        </div>
    </div>

    <script>
        function validar(url) {
            var eliminar = confirm("¿Confirmar que el pedido ha sido entregado?");
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