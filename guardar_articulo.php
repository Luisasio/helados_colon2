<?php 
require "conexion.php";

$nombre_articulo = $_POST["nombre_articulo"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];
$proveedor = $_POST["proveedor"];
$numero_proveedor = $_POST["numero_proveedor"];

$rutaEnServidor = "fotosarticulos";
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];

//para que no se sobreescriban los nombres de las fotos 
date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "_" . $nombreImagen;

$rutaDestino = $rutaEnServidor. '/' .$nombreimagenunico;

// validacion del peso de la imagen
$pesofoto = $_FILES['imagen']['size'];
$tipofoto = $_FILES['imagen']['type'];

if ($pesofoto > 900000) {
echo '
<script>
alert("Es demasiado pesada para el post");
window.history.go(-1);
</script>
';
exit;
}

if ($tipofoto == "image/webp" or $tipofoto == 'image/jpeg' or $tipofoto == 'image/png' or $tipofoto == 'image/gif' or $tipofoto == 'image/jpg' or $nombreImagen == '') {
  move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
echo '
<script>
alert("No es una IMAGEN");
window.history.go(-1);
</script>
';
exit;
}

$insertar = "INSERT INTO articulos (nombre_articulo, cantidad, descripcion, proveedor, numero_proveedor, imagen) VALUES ('$nombre_articulo','$cantidad','$descripcion','$proveedor','$numero_proveedor','$rutaDestino')";
$query = mysqli_query($conectar, $insertar);


if ($query) {
echo '
<script>
alert("SE GUARDARO EL POST CORRECTAMENTE");
location.href="inventario.php ";
</script>
';
} else {
echo '
<script>
alert("NO SE GUARDO EL POST");
location.href="registrar_articulo.php";
</script>
';
}

exit();




?>