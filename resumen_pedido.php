<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="style_landing.css">
    <script>
      history.pushState(null, null, location.href);
      window.onpopstate = function() {
          history.go(1);
      };
      // Generar número aleatorio de 4 cifras
      function generarFolio() {
              const folio = Math.floor(1000 + Math.random() * 9000); // Genera un número entre 1000 y 9999
              document.getElementById("folio").innerText = folio; // Asigna el número al elemento con id 'folio'
          }

          // Llamar la función al cargar la página
          window.onload = generarFolio;
    </script>
</head>
<body>
    <br>
    <div class="ancho text-center">
        <h2>Confirmación de Registro</h2>
    </div>
    <br>
    <div class="confirmation-container">
        <div class="success-message">
            <h3>La compra se ha acreditado correctamente</h3>
        </div>
        
        <div class="team-info text-center">
            <h3>Información del Pedido</h3>
            <div class="folio">
                <h3>Folio:</h3>
                <br>
                <p id="folio"></p>
            </div>
            <br>
            <p><strong>Nombre del cliente:</strong></p>
            <p><?php echo htmlspecialchars($_GET['nombre_cliente_pedido']); ?></p>
            <p><strong>Correo del cliente:</strong> </p>
            <p><?php echo htmlspecialchars($_GET['correo_cliente_pedido']); ?></p>
            <p><strong>Lugar:</strong> </p>
            <p><?php echo htmlspecialchars($_GET['numero_mesa']); ?></p>
            <p><strong>Metodo de pago:</strong> </p>
            <p><?php echo htmlspecialchars($_GET['metodo_pago']); ?></p>
            <p><strong>Comentarios:</strong> </p>
            <p><?php echo htmlspecialchars($_GET['comentarios_cantidad']); ?></p>
        </div>
    </div>

    <br>
    <div class=" ancho text-center">
        <a href="pedidos_landing.php" class="btn_atras"> << Regresar al Inicio </a>
    </div>
    <br><br><br>
</body>
</html>