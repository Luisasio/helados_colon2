<?php
include 'conexion.php';

$insertar_pedido ="SELECT pedidos.id_pedido, tarjetas.id_tarjeta FROM pedidos INNER JOIN tarjetas ON pedidos.id_pedido = tarjetas.id_tarjeta;"


?>