
<?php 
require "conexion.php";
$helado=$_POST['helado'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$codigo=$_POST['codigo'];

$rutaEnServidor = 'imagen_helados';
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];

// para que no se sobreescriban los nombres de fotos
date_default_timezone_set('UTC');
$nombreimagenunico = date("Y-m-d-h-i-s") . "-" . $nombreImagen;

$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunico;

// validacion del peso de la imagen
$pesofoto = $_FILES['imagen']['size'];
$tipofoto = $_FILES['imagen']['type'];

if ($pesofoto > 900000) {
echo '
<script>
alert("Es demasiado pesada la foto");
window.history.go(-1);
</script>
';
exit;
}

if ($tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {
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

$insertar = "INSERT INTO helados (helado, descripcion, precio, ruta, codigo) VALUES ('$helado','$descripcion','$precio','$rutaDestino','$codigo')";
$query = mysqli_query($conectar, $insertar);
if ($query) {
echo '
<script>
alert("SE GUARDO EL HELADO CORRECTAMENTE");
location.href="insumos.php";
</script>
';
} else {
echo '
<script>
alert("HUBO UN PROBLEMA AL GUARDAR EL HELADO, INTENTE DE NUEVO");
 window.history.go(-1);
</script>
';
}

?>