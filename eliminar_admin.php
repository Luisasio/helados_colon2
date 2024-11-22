<?php
require "conexion.php";
$id = $_GET['id'];

$eliminar = "DELETE FROM administradores WHERE id_admin = '$id'";

$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    header("location:administradores.php");
} else {
    echo "Error al eliminar el administrador";
}

?>
