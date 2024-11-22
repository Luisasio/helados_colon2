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
    </div><br><br>
  </div>
  
  <div class="ancho contenedor_nuestros_productos"> <br><br>
    <h2 class="text-center">Sorbetes</h2>
    <br>
    <p class="text-center">Elaborados de fruta 100% natural, siempre serán los más consentidos para disfrutar en cualquier momento.
    </p>
    <hr class="barra_amarilla1 text-center">
    <br>
    <div class="contenedor_sorbetes_li">
      <?php
      require "conexion.php";

      $todos_datos = "SELECT * FROM helados ORDER BY id_helados ASC";// el DES LIMIT es para limitar los contenedores
      $resultado = mysqli_query($conectar, $todos_datos);
      while ($fila = mysqli_fetch_assoc($resultado)){
      ?>
      <div>
      <a href="codigo_de_barra_helados.php?id_helados=<?php echo $fila['id_helados']; ?>"><img src="<?php echo $fila["ruta"];?>" class="img_sorbete"></a>
        <p class="texto-sorbete"><?php echo $fila["helado"];?></p>
      <a href="codigo_de_barra_helados.php?id_helados=<?php echo $fila['id_helados']; ?>"><p class="texto-sorbete"><?php echo $fila["codigo"]?></p></a>
      </div>
      <?php }?>
    </div>
  </div>
  <br>
  <div class="ancho contenedor_dulce_trad">
    <h2 class="text-center">Una dulce tradicion</h2>
  </div>
  <div class="ancho contenedor_nuestros_productos">
    <h2 class="text-center">Nuestros Dulces, una degustación de arte
    </h2>
    <br>
    <p class="text-center">Cada uno de nuestros productos son elaborados cuidadosamente por artesanos.</p>
    <hr class="barra_amarilla1 text-center">
    <br>
    <div class="contenedor_sorbetes_li">
      <?php
      require "conexion.php";

      $todos_datos = "SELECT * FROM dulces ORDER BY id_dulces ASC";// el DES LIMIT es para limitar los contenedores
      $resultado = mysqli_query($conectar, $todos_datos);
      while ($fila = mysqli_fetch_assoc($resultado)){
      ?>
      <div>
      <a href="codigo_de_barra_dulce.php?id_dulces=<?php echo $fila['id_dulces']; ?>"><img src="<?php echo $fila["ruta"];?>" class="img_sorbete"></a>
        <p class="texto-sorbete"><?php echo $fila["dulce"];?></p>
        <p class="texto-sorbete"><?php echo $fila["codigo"]?></p>
      </div>
      <?php }?>
    </div>
  </div>
  <br>
  <div class="ancho contenedor_info">
    <div class="visitanos1">
      <h3>Vísitanos</h3>
      <br>
      <p><i class="fa-solid fa-location-dot ubi"></i>Sucursal del centro</p>
      <p class="tel">(999) 928.14.97</p>
      <p><i class="fa-solid fa-location-dot ubi"></i>Sucursal Paseo de Montejo</p>
      <p class="tel">(999) 927.64.43</p>
      <p><i class="fa-solid fa-location-dot ubi"></i>Sucursal Plaza Dorada</p>
      <p class="tel">(999) 987.13.67</p>
    </div>
    <div class="visitanos2">
      <br><br>
      <p><i class="fa-solid fa-location-dot ubi"></i>Sucursal Francisco de Montejo</p>
      <p class="tel">(999) 981.57.71</p>
      <p><i class="fa-solid fa-location-dot ubi"></i>Sucursal Gran Plaza</p>
      <p class="tel">(999) 944.78.65</p>
    </div>
    <div class="siguenos">
      <h3>Síguenos</h3>
      <br>
      <a href="">
      <div class="cont_redes2">
        <i class="fa-brands fa-facebook-f insta2"></i>
      </div>
      </a>
      <a href="">
      <div class="cont_redes2">
        <i class="fa-brands fa-instagram insta2"></i>
      </div>
      </a>
    </div>
  </div>
  <div class="ancho cont_pie">
    <h2 class="text-center">© 2024.Helados Colón. Todos los derechos reservados.</h2>
  </div>
</body>
</html>