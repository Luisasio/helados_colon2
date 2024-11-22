<?php
require "conexion.php";

$id = $_POST['id'];
$nombre = addslashes($_POST['nombre']);
$correo = addslashes($_POST['correo']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);
$telefono = addslashes($_POST['telefono']);

$actualizar= "UPDATE administradores SET nombre='$nombre', correo='$correo', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono'  WHERE id_admin='$id'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo
    '<script>
        alert ("Se edito el Administrador.");
        location.href="ver_admin.php?id='.$id.'";
      </script>';
  } else {
    echo
    '<script>
        alert ("Error. Intente otra vez.");
        location.href="editar_admin.php?id='.$id.'";
      </script>'; exit;
  }

?>