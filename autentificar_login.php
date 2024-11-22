<?php
require "conexion.php";
$correo = addslashes($_POST['correo']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM administradores WHERE correo = '$correo' LIMIT 1";
$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {

    $fila = $resultado->fetch_array();

    if (password_verify($contrasena, $fila["contrasena"])) {
        session_start();
        $_SESSION['username'] = $correo;
        $_SESSION['autentificado'] = "SI";
        header("Location: panelAdmin_heladosColon.php");
    } else {
        header("Location: index.php?errorusuario=SI");
    }
} else {
    // Si no se encuentra el correo en la base de datos
    header("Location: index.php?noexisteusuario=SI");
}

mysqli_free_result($resultado);
mysqli_close($conectar);
