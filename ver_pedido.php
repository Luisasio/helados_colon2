<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información completa del Pedido</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Información completa del pedido</h1>
                <hr>
            </div>
            <br>

            <div class="contenedor5 centrar">

                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="pedidos.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>

                <?php
                require "conexion.php";
                $id = $_GET['id'];

                $verpedido = "SELECT * FROM pedidos WHERE id_pedido = '$id'";
                $resultado = mysqli_query($conectar, $verpedido);

                $fila = $resultado->fetch_array();

                ?>

                <div class="contenedor7">
                    <h3>Nombre completo del cliente:</h3>
                    <p><?php echo $fila["nombre_cliente_pedido"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Correo del cliente:</h3>
                    <p><?php echo $fila["correo_cliente_pedido"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Teléfono del cliente:</h3>
                    <p><?php echo $fila["telefono_cliente_pedido"]; ?></p>
                    <hr>
                </div>

                <div class="contenedor7">
                    <h3>Número de la mesa:</h3>
                    <p><?php echo $fila["numero_mesa"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Método de pago:</h3>
                    <p><?php echo $fila["metodo_pago"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Pedido del cliente:</h3>
                    <p><?php echo $fila["pedido_cliente_pedido"]; ?></p>
                    <hr>
                </div>
                <div class="contenedor7">
                    <h3>Comentarios y cantidad del pedido:</h3>
                    <p><?php echo $fila["comentarios_cantidad"]; ?></p>
                    <hr>
                </div>
                <br>
            </div>
            <br>
        </div>

</body>

</html>