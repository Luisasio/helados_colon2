<?php
require "conexion.php";

$id_articulo = $_POST["id_articulo"];
$cantidad = $_POST["cantidad"];

//para que no se sobreescriban los nombres de las fotos 
if ('') {
  echo "hola";
} else {
    // Si no se subió una nueva imagen, no actualizar la ruta
    $actualizar_cantidad = "UPDATE articulos SET cantidad = '$cantidad' WHERE id_articulo = '$id_articulo'";
}

// Ejecutar la consulta
$query = mysqli_query($conectar, $actualizar_cantidad);

if ($query){
  echo '
    <script>
      alert("Se actualizaron los datos correctamente");
      location.href="inventario.php";
    </script>
  ';
} else {
  echo '
  <script>
    alert("Hubo un error al actualizar los datos");
    window.history.go(-1);
  </script>
  ';
}
?>