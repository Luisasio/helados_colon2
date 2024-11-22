<?php 

require "conexion.php";
$id=$_GET['id'];
$borrar="DELETE FROM pedidos WHERE id_pedido='$id'";
$resultado=mysqli_query($conectar,$borrar);

if($resultado)
{
echo'

<script>
alert("Se ha confirmado la entrega de este pedido");
location.href="pedidos.php"
</script>

';

}

?>