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
                <br><br>

                <div class="confirmation-container">
                    <div class="team-info text-center">
                        <h3>Información de la compra</h3>
                        <br>
                        <p><strong>Nombre del cliente:</strong></p>
                        <p><?php echo $fila["nombre_cliente_pedido"]; ?></p>
                        <p><strong>Correo del cliente:</strong> </p>
                        <p><?php echo $fila["correo_cliente_pedido"]; ?></p>
                        <p><strong>Telefono:</strong> </p>
                        <p><?php echo $fila["telefono_cliente_pedido"]; ?></p>
                        <p><strong>Lugar:</strong> </p>
                        <p><?php echo $fila["numero_mesa"]; ?></p>
                        <p><strong>Metodo de pago:</strong> </p>
                        <p><?php echo $fila["metodo_pago"]; ?></p>
                        <p><strong>Primeros digitos de tarjeta:</strong> </p>
                        <p><?php echo $fila["numero_tarjeta"]; ?></p>
                    </div>
                </div>
            </div>
            <br>
        </div>

</body>

</html>