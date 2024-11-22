<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos | Colon</title>
  <link rel="icon" type="image/png" href="img/logo_colon.png">
  <link rel="stylesheet" href="style_landing.css">
  <script src="https://kit.fontawesome.com/fe8b02346c.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Oriya:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fe8b02346c.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="ancho contenedor_nav">
    <div class="contenedor_logo">
      <a href="elcolon.php"><img src="img/logo-header.png" class=""></a>
    </div>
    <div class="contenedor_opciones">
      <a href="elcolon.php" class="estilo_opciones" >INICIO</a>
      <a href="productos.php" class="estilo_opciones" id="productos">PRODUCTOS</a>
      <a href="pedidos_landing.php" class="estilo_opciones">PEDIDOS</a>
      <!-- <a href="" class="estilo_opciones">GALERÍA</a> -->
      <!-- <a href="" class="estilo_opciones">SUCURSALES</a> -->
      <!-- <a href="" class="estilo_opciones">CONTACTO</a> -->
      <a href="">
      <div class="cont_redes">
        <i class="fa-brands fa-facebook-f insta"></i>
      </div>
      </a>
      <a href="">
      <div class="cont_redes">
        <i class="fa-brands fa-instagram insta"></i>
      </div>
      </a>
    </div>
  </div>
  <div class="ancho contenedor_dulce_trad">
    <h2 class="text-center">Una dulce tradicion</h2>
  </div> <br>
  <div class="contenedor_barra">
  <a href="productos.php" class="btn_barra_regresar">>>Regresa</a> <br><br>
<?php
require "conexion.php";
$id = $_GET['id_dulces'];


$verusuario = "SELECT * FROM dulces WHERE id_dulces = '$id'";
$resultado = mysqli_query($conectar, $verusuario);

$fila = $resultado->fetch_array();
?>
<div<div class="dulce-container">
    <div class="contenedor7">
        <h3 class="titulo-dulce">Nombre del dulce:</h3>
        <p class="texto-dulce"><?php echo $fila["dulce"]; ?></p>
        <hr>
    </div>

    <div class="contenedor7">
        <h3 class="titulo-dulce">Descripción del dulce:</h3>
        <p class="texto-dulce"><?php echo $fila["descripcion"]; ?></p>
        <hr>
    </div>

    <div class="contenedor7">
        <h3 class="titulo-dulce">Foto del dulce:</h3>
        <img src="<?php echo $fila['ruta']; ?>" class="imagen_barra">
        <hr>
    </div>

    <div class="contenedor7">
        <h3 class="titulo-dulce">Precio:</h3>
        <p class="texto-dulce">$<?php echo $fila["precio"]; ?></p>
        <hr>
    </div>
</div>
                <br>
            </div>
            <br>
        </div>    
</body>
</html>
