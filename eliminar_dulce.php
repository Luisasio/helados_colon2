<?php 

require "conexion.php";
$id=$_GET['id'];
$borrar="DELETE FROM dulces WHERE id_dulces='$id'";
$resultado=mysqli_query($conectar,$borrar);

if($resultado)
{
echo'

<script>
alert("Se elimino el dato correctamente");
location.href="dulces.php"
</script>

';

}

?>