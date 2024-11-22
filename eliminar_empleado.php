<?php
require "conexion.php";
$id = $_GET['id'];

$eliminar = "DELETE FROM empleados WHERE id_empleado = '$id'";

$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    header("location:empleados.php");
} else {
    echo "Error al eliminar el empleado";
}

?>
