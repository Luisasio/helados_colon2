<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "heladoscolon";

$conectar = mysqli_connect($host, $user, $pass, $db);

if (!$conectar) {
    echo "No se puedo conectar a la base de datos";
}
?>