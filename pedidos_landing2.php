<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | Colon</title>
    <link rel="icon" type="image/png" href="img/logo_colon.png">
    <link rel="stylesheet" href="style_landing.css">
    <script src="https://kit.fontawesome.com/fe8b02346c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="ancho contenedor_nav">
        <div class="contenedor_logo">
            <a href="elcolon.php"><img src="img/logo-header.png" class=""></a>
        </div>
        <div class="contenedor_opciones">
            <a href="elcolon.php" class="estilo_opciones" id="inicio">INICIO</a>
            <a href="productos.php" class="estilo_opciones">PRODUCTOS</a>
            <a href="pedidos_landing.php" class="estilo_opciones">PEDIDOS</a>
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

    <div class="contenedor_imagen_principal ancho">
        <h1>SOLICITE AQUÍ</h1>
        <h2>SU ORDEN</h2><br>
        <div class="text-center">
            <img src="img/barra_azul.png" alt="">
        </div>
    </div>

    <div class="ancho contenedor_nuestros_productos">
        <h2 class="text-center">Complete el siguiente formulario:</h2><br>
        <p class="text-center">Todas las ordenes y entregas se realizan en el horario de nuestro establecimiento</p>
        <hr class="barra_amarilla1 text-center"><br>
        <div class="contenedor_formulario_pedidos">
            <form action="guardar_pedido.php" method="POST" class="izq" onsubmit="return validarFormulario()">
                <br>
                <label for="#">Ingrese su nombre:</label>
                <input class="inputs_campos" type="text" name="nombre_cliente_pedido" id="nombre_cliente_pedido" required><br><br>
                <label for="#">Ingrese su correo electrónico:</label>
                <input class="inputs_campos" type="email" name="correo_cliente_pedido" id="correo_cliente_pedido" oninput="filtrarCaracteresEspeciales(this)" required><br><br>
                <label for="#">Ingrese su número de teléfono:</label>
                <input class="inputs_campos" type="tel" name="telefono_cliente_pedido" id="telefono_cliente_pedido" maxlength="10" pattern="999\d{7}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required><br><br>
                <label for="#">Ingrese el número de la mesa:</label>
                <select name="numero_mesa" class="inputs_campos" id="numero_mesa" required>
                    <option value="" disabled selected></option>
                    <option value="Mesa 1">Mesa 1</option>
                    <option value="Mesa 2">Mesa 2</option>
                    <option value="Mesa 3">Mesa 3</option>
                    <option value="Mesa 4">Mesa 4</option>
                    <option value="Mesa 5">Mesa 5</option>
                    <option value="Mesa 6">Mesa 6</option>
                    <option value="Mesa 7">Mesa 7</option>
                    <option value="Mesa 8">Mesa 8</option>
                    <option value="Mesa 9">Mesa 9</option>
                    <option value="Mesa 10">Mesa 10</option>
                </select><br><br>
                <label for="#">Seleccione un método de pago:</label>
                <select name="metodo_pago" class="inputs_campos" id="metodo_pago" onchange="mostrarCamposTarjeta()" required>
                    <option value="" disabled selected></option>
                    <option value="Tarjeta de crédito o debito">Tarjeta de crédito o debito</option>
                    <option value="Pago en efectivo">Pago en efectivo</option>
                </select><br><br>

                <!-- Campos ocultos para tarjeta -->
                <div id="campos_tarjeta" style="display: none;">
                    <label for="numero_tarjeta">Número de Tarjeta:</label>
                    <input type="text" id="numero_tarjeta" name="numero_tarjeta" maxlength="16" pattern="\d{16}" placeholder="Número de Tarjeta"><br><br>

                    <label for="nip_tarjeta">NIP:</label>
                    <input type="password" id="nip_tarjeta" name="nip_tarjeta" maxlength="4" pattern="\d{4}" placeholder="NIP"><br><br>
                </div>

                <!-- Continuación del formulario -->
                <label>Comentarios extras del pedido</label>
                <textarea name="comentarios_cantidad" class="inputs_campos altura" maxlength="255"></textarea>
                <br><br>
                <input type="submit" value="Registrar pedido" class="btn_pedido">
                <br><br>
            </form>
        </div>
    </div>

    <script>
        function mostrarCamposTarjeta() {
            const metodoPago = document.getElementById("metodo_pago").value;
            const camposTarjeta = document.getElementById("campos_tarjeta");

            if (metodoPago === "Tarjeta de crédito o debito") {
                camposTarjeta.style.display = "block";
                document.getElementById("numero_tarjeta").setAttribute("required", "true");
                document.getElementById("nip_tarjeta").setAttribute("required", "true");
            } else {
                camposTarjeta.style.display = "none";
                document.getElementById("numero_tarjeta").removeAttribute("required");
                document.getElementById("nip_tarjeta").removeAttribute("required");
            }
        }

        function validarFormulario() {
            // Validación del formulario como en tu código original
            return true;
        }

        function filtrarCaracteresEspeciales(input) {
            // Elimina caracteres especiales
            input.value = input.value.replace(/[-+*%${},&#"!¡¿?()´´><]/g, '');
        }
    </script>
</body>
</html>
