<?php
require "conexion.php";
$id_articulo = $_GET['id_articulo'];

$eliminar = "DELETE FROM articulos WHERE id_articulo = '$id_articulo'";

$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    header("location:inventario.php");
} else {
    echo "Error al eliminar el empleado";
}

?>
