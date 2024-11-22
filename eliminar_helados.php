<?php 

require "conexion.php";
$id=$_GET['id'];
$borrar="DELETE FROM helados WHERE id_helados='$id'";
$resultado=mysqli_query($conectar,$borrar);

if($resultado)
{
echo'

<script>
alert("Se elimino el dato correctamente");
location.href="insumos.php"
</script>

';

}

?>