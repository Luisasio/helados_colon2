<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "heladoscolon"; //nombre de la base de datos 

$conectar = mysqli_connect($host, $usuario, $contrasena, $basedatos);

if (!$conectar) {
  echo "No se pudo conectar con el servidor";
}
?>