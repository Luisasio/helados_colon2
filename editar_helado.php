<?php
include "seguridad.php";
$adminCorreo = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administrador</title>
    <link rel="stylesheet" href="style_panel_admin.css">

</head>

<body>
    <div class="ancho">

        <?php
        include "menu_panel_admin.php";
        ?>

        <div class="contenedorpaneladmin">
            <div class="contenedor4 centrar">
                <h1>Registrar Articulos</h1>
                <hr>
            </div>
            <br>


            <?php
          require "conexion.php";
          $id=$_GET['id'];
          $verusuario = "SELECT * FROM helados WHERE id_helados = '$id'";
          $resultado = mysqli_query($conectar, $verusuario);

          $fila = $resultado -> fetch_array();
           ?>

            <div class="contenedor5 ">
                <div class="centrar">
                <img src="./img/logo_colon.png" class="logopaneladmin1">
                <br><br>
                <a href="insumos.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <div class="ancho contenedor6">
                    <form action="actualizar_helado.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <p class="negritas">Porfavor, llene los siguientes campos:</p>

                        <input class="campos_login" type="text" placeholder="Sabor del helado" name="helado" required  value="<?php echo $fila['helado'];?>">
                        <br><br>

                        <input class="campos_login" type="file" name="imagen" required>
                        <br><br>

                        <textarea name="descripcion" class="campos_login" placeholder="Descripción"><?php echo $fila['descripcion'];?></textarea>
                        <br><br>

                        <input class="campos_login" type="text" placeholder="Precio del helado" name="precio" required  value="<?php echo $fila['precio'];?>">
                        <br><br>
                        <input type="hidden" name="id" value="<?php echo $fila['id_helados'];?>">
                         <button  class="registrar_admin">Editar Helado</button>
                        
                        <br><br>
                        <hr>
                    </form>
                </div>
                <br><br>
            </div>
            <br>
        </div>

</body>

</html>