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
        <option value="" selected>Seleccione el metodo de pago</option>
        <option value="Tarjeta de crédito o debito">Tarjeta de crédito o debito</option>
        <option value="Pago en efectivo">Pago en efectivo</option>
    </select><br><br>

    <!-- Nuevos campos para tarjeta -->
    <script>
function detectarBanco(numeroTarjeta) {
    // Eliminar espacios y guiones
    numeroTarjeta = numeroTarjeta.replace(/[\s-]/g, '');

    // Patrones de prefijos para bancos mexicanos
    const bancos = [
        { nombre: 'Banamex', prefijos: ['4220', '4242', '3540'], longitud: [16] },
        { nombre: 'Bancomer', prefijos: ['4152', '4154', '4155'], longitud: [16] },
        { nombre: 'Santander', prefijos: ['4013', '4019', '5468'], longitud: [16] },
        { nombre: 'HSBC', prefijos: ['4212', '5226', '5227'], longitud: [16] },
        { nombre: 'Banco Azteca', prefijos: ['5026', '5542'], longitud: [16] },
        { nombre: 'American Express', prefijos: ['3'], longitud: [15] },
        { nombre: 'Visa', prefijos: ['4152'], longitud: [16] },
        { nombre: 'Mastercard', prefijos: ['5'], longitud: [16] }
    ];

    for (let banco of bancos) {
        // Verificar prefijos y longitud
        if (banco.prefijos.some(prefijo => numeroTarjeta.startsWith(prefijo)) && 
            banco.longitud.includes(numeroTarjeta.length)) {
            return banco.nombre;
        }
    }

    return 'Banco no identificado';
}

// Función para mostrar el banco en tiempo real
function mostrarBanco() {
    const numeroTarjeta = document.getElementById('numero_tarjeta').value;
    const bancoDetectado = document.getElementById('banco_detectado');
    
    if (numeroTarjeta.length >= 3) {
        bancoDetectado.textContent = detectarBanco(numeroTarjeta);
        bancoDetectado.style.display = 'block';
    } else {
        bancoDetectado.style.display = 'none';
    }
}

// Modificar la función validarFormulario para usar la detección de banco
function validarFormulario() {
    // Validaciones anteriores...
    
    if (metodoPago === 'Tarjeta de crédito o debito') {
        let numeroTarjeta = document.getElementById('numero_tarjeta').value;
        let nipTarjeta = document.getElementById('nip_tarjeta').value;
        let bancoDetectado = detectarBanco(numeroTarjeta);

        if (bancoDetectado === 'Banco no identificado') {
            alert("Por favor, ingrese un número de tarjeta válido.");
            return false;
        }
        
        // Resto de validaciones...
    }

    return true;
}
</script>
<div class="contenedor_pago ancho" id="campos_tarjeta" style="display: none;">
    <p>Paga con tarjeta de credito</p>
    <br>
    <hr>
    <br>
    <label for="">Nombre en la tarjeta</label>
    <input type="text" name="" class="elemento_form_pago" placeholder="Nombre como aparce en la tarjeta" maxlength="50" required> 
    <br><br>
    <div class="input-container">
      <img src="img/visa.png" alt="icono" class="input-icon">
      <img src="img/master.png" alt="icono" class="input-icon2">
      <img src="img/american.png" alt="icono" class="input-icon3">
      <label for="">Número de la tarjeta</label>
      <input type="text" name="numero_tarjeta" id="numero_tarjeta" maxlength="19" class="elemento_form_pago" placeholder="0000 0000 0000 0000"  pattern="(\d{4} ?){4}"  oninput="this.value = this.value.replace(/[^0-9]/g, ''); mostrarBanco();">
    </div>
    <div id="banco_detectado" style="display: none; color: blue; margin-bottom: 10px;"></div>
    <br><br>
    <div class="form-container">
      <div class="form-group">
        <label for="expiracion">Expiración</label>
        <input type="text" name="expiracion" id="expiration" maxlength="5" class="elemento_form_pago1 input-expiration" placeholder="MM/AA">
        <div class="error-message">Ingresa una fecha válida</div>
      </div>
      <div class="form-group">
        <label for="cvv">NIP</label>
        <input type="password" name="nip_tarjeta" id="nip_tarjeta" maxlength="4" pattern="\d{4}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"   class="elemento_form_pago1" placeholder="NIP de 4 digitos">
      </div>
    </div>
  </div>
  <script>
      const cardInput = document.getElementById('numero_tarjeta');

      cardInput.addEventListener('input', function(e) {
          // Eliminar cualquier caracter que no sea número
          let valor = e.target.value.replace(/\D/g, '');
          
          // Agregar un espacio cada 4 dígitos
          valor = valor.replace(/(\d{4})(?=\d)/g, '$1 ');
          
          // Actualizar el valor del input
          e.target.value = valor;
      });

      // Opcional: Prevenir que se pegue texto con formato incorrecto
      cardInput.addEventListener('paste', function(e) {
          e.preventDefault();
          let texto = (e.clipboardData || window.clipboardData).getData('text');
          texto = texto.replace(/\D/g, '');
          texto = texto.replace(/(\d{4})(?=\d)/g, '$1 ');
          
          // Solo tomar los primeros 16 dígitos
          texto = texto.slice(0, 19);
          
          this.value = texto;
      });

      const expirationInput = document.getElementById('expiration');

            function formatExpiration(value) {
                // Eliminar cualquier caracter que no sea número
                let cleanValue = value.replace(/\D/g, '');
                
                // Limitar a 4 dígitos
                cleanValue = cleanValue.slice(0, 4);
                
                // Separar mes y año
                if (cleanValue.length > 2) {
                    return cleanValue.slice(0, 2) + '/' + cleanValue.slice(2);
                }
                
                return cleanValue;
            }

            function validateExpiration(month, year) {
                // Convertir a números
                const currentDate = new Date();
                const currentYear = currentDate.getFullYear() % 100; // Obtener últimos 2 dígitos del año
                const currentMonth = currentDate.getMonth() + 1; // getMonth() devuelve 0-11
                
                month = parseInt(month, 10);
                year = parseInt(year, 10);
                
                // Validar mes
                if (month < 1 || month > 12) return false;
                
                // Validar que la fecha no esté en el pasado
                if (year < currentYear || (year === currentYear && month < currentMonth)) return false;
                
                // Validar que la fecha no esté muy en el futuro (opcional, ajusta según necesites)
                if (year > currentYear + 6) return false;
                
                return true;
            }

        expirationInput.addEventListener('input', function(e) {
            let value = e.target.value;
            
            // Si el usuario intenta escribir una letra, la ignoramos
            if (/[^\d/]/.test(value)) {
                value = value.replace(/[^\d/]/g, '');
            }
            
            // Formatear el valor
            let formattedValue = formatExpiration(value);
            
            // Actualizar el valor del input
            e.target.value = formattedValue;
            
            // Validar si tenemos una fecha completa
            if (formattedValue.length === 5) {
                const [month, year] = formattedValue.split('/');
                
                if (validateExpiration(month, year)) {
                    this.classList.add('valid');
                    this.classList.remove('invalid');
                } else {
                    this.classList.add('invalid');
                    this.classList.remove('valid');
                }
            } else {
                this.classList.remove('valid', 'invalid');
            }
        });

        // Manejar cuando el usuario pega un texto
        expirationInput.addEventListener('paste', function(e) {
            e.preventDefault();
            let pastedText = (e.clipboardData || window.clipboardData).getData('text');
            let formattedValue = formatExpiration(pastedText);
            this.value = formattedValue;
        });

        // Validación adicional mientras se escribe
        expirationInput.addEventListener('keypress', function(e) {
            // Permitir solo números y la tecla de borrar
            if (!/^\d$/.test(e.key) && e.key !== 'Backspace') {
                e.preventDefault();
            }
            
            // Si el primer número es mayor a 1, solo permitir 0-2 como segundo número
            if (this.value.length === 1 && this.value[0] === '1' && parseInt(e.key) > 2) {
                e.preventDefault();
            }
            
            // No permitir meses mayores a 12
            if (this.value.length === 1 && parseInt(this.value + e.key) > 12) {
                e.preventDefault();
            }
        });
  </script>
<!-- Modificar el HTML para incluir la detección de banco -->
<!-- <div id="campos_tarjeta" style="display: none;">
    <label for="numero_tarjeta">Número de tarjeta:</label>
    <input class="inputs_campos" type="text" name="numero_tarjeta" id="numero_tarjeta" 
           maxlength="16" pattern="\d{16}" 
           oninput="this.value = this.value.replace(/[^0-9]/g, ''); mostrarBanco();" 
           placeholder="Ingrese los 16 dígitos"><br> -->
    
    <!-- Mostrar banco detectado -->
    <!-- <div id="banco_detectado" style="display: none; color: blue; margin-bottom: 10px;"></div>
    
    <label for="nip_tarjeta">NIP:</label>
    <input class="inputs_campos" type="password" name="nip_tarjeta" id="nip_tarjeta" 
           maxlength="4" pattern="\d{4}" 
           oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
           placeholder="Ingrese 4 dígitos"><br><br>
</div><br><br> -->

                <label>Seleccione Dulces:</label><br>
                <?php
                require "conexion.php";
                $consulta_dulces = "SELECT id_dulces, dulce FROM dulces";
                $resultado_dulces = mysqli_query($conectar, $consulta_dulces);
                while ($fila_dulces = mysqli_fetch_array($resultado_dulces)) {
                    $id_dulce = 'dulce_' . $fila_dulces['id_dulces'];
                    echo '<input type="checkbox" name="dulces[]" value="' . htmlspecialchars($fila_dulces['dulce']) . '" onclick="toggleCantidad(this, \'' . $id_dulce . '\')"> ' . htmlspecialchars($fila_dulces['dulce']);
                    echo '<input class="cantidad_campo" type="number" name="cantidad_' . str_replace(' ', '_', $fila_dulces['dulce']) . '" id="' . $id_dulce . '" placeholder="Cantidad" style="display:none;" min="1"><br>';
                }
                ?>
                <br>
                <label>Seleccione Helados:</label><br>
                <?php
                $consulta_helados = "SELECT id_helados, helado FROM helados";
                $resultado_helados = mysqli_query($conectar, $consulta_helados);
                while ($fila_helados = mysqli_fetch_array($resultado_helados)) {
                    $id_helado = 'helado_' . str_replace(' ', '_', $fila_helados['id_helados']);
                    echo '<input type="checkbox" name="helados[]" value="' . htmlspecialchars($fila_helados['helado']) . '" onclick="toggleCantidad(this, \'' . $id_helado . '\')"> ' . htmlspecialchars($fila_helados['helado']);
                    echo '<input class="cantidad_campo" type="number" name="cantidad_' . str_replace(' ', '_', $fila_helados['helado']) . '" id="' . $id_helado . '" placeholder="Cantidad" style="display:none;" min="1" max="50"><br>';
                }
                ?>

                <script>
                    function toggleCantidad(checkbox, inputId) {
                        var cantidadInput = document.getElementById(inputId);
                        cantidadInput.style.display = checkbox.checked ? 'inline' : 'none';
                        if (!checkbox.checked) cantidadInput.value = '';
                    }

                    function filtrarCaracteresEspeciales(input) {
                        // Elimina los caracteres especiales: -, +, *, %, $
                        input.value = input.value.replace(/[-+*%${},&#"!¡¿?()´´><]/g, '');
                    }

                    function validarFormulario() {
                        let nombre = document.getElementById('nombre_cliente_pedido').value.trim();
                        let correo = document.getElementById('correo_cliente_pedido').value.trim();
                        let telefono = document.getElementById('telefono_cliente_pedido').value.trim();
                        let numeroMesa = document.getElementById('numero_mesa').value.trim();
                        let metodoPago = document.getElementById('metodo_pago').value.trim();
                        const nombreRegex = /^[a-zA-ZÁÉÍÓÚáéíóúÑñ\s]+$/;
                        const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                        nombre = nombre.replace(/\s+/g, ' ');
                        document.getElementById('nombre_cliente_pedido').value = nombre;

                        if (!nombre || !nombreRegex.test(nombre)) {
                            alert("El nombre solo puede contener letras y no puede estar vacío o consistir solo en espacios.");
                            return false;
                        }

                        if (!correo || !correoRegex.test(correo)) {
                            alert("Por favor, ingrese un correo electrónico válido.");
                            return false;
                        }

                        if (!telefono.match(/^999\d{7}$/)) {
                            alert("El número de teléfono debe empezar con '999' y tener 10 dígitos en total.");
                            return false;
                        }

                        if (!numeroMesa || numeroMesa === "") {
                            alert("Por favor, seleccione un número de mesa.");
                            return false;
                        }

                        if (!metodoPago || metodoPago === "") {
                            alert("Por favor, seleccione un método de pago.");
                            return false;
                        }

                        return true;
                    }
                    //  aparece el metodo de pago
                    function mostrarCamposTarjeta() {
        var metodoPago = document.getElementById('metodo_pago').value;
        var camposTarjeta = document.getElementById('campos_tarjeta');
        
        if (metodoPago === 'Tarjeta de crédito o debito') {
            camposTarjeta.style.display = 'block';
        } else {
            camposTarjeta.style.display = 'none';
            // Limpiar los campos cuando se ocultan
            document.getElementById('numero_tarjeta').value = '';
            document.getElementById('nip_tarjeta').value = '';
        }
    }

    function validarFormulario() {
        let nombre = document.getElementById('nombre_cliente_pedido').value.trim();
        let correo = document.getElementById('correo_cliente_pedido').value.trim();
        let telefono = document.getElementById('telefono_cliente_pedido').value.trim();
        let numeroMesa = document.getElementById('numero_mesa').value.trim();
        let metodoPago = document.getElementById('metodo_pago').value.trim();
        let expirationInput = document.getElementById('expiration');
        const nombreRegex = /^[a-zA-ZÁÉÍÓÚáéíóúÑñ\s]+$/;
        const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validaciones existentes...
        if (!nombre || !nombreRegex.test(nombre)) {
            alert("El nombre solo puede contener letras y no puede estar vacío o consistir solo en espacios.");
            return false;
        }

        if (!correo || !correoRegex.test(correo)) {
            alert("Por favor, ingrese un correo electrónico válido.");
            return false;
        }

        if (!telefono.match(/^999\d{7}$/)) {
            alert("El número de teléfono debe empezar con '999' y tener 10 dígitos en total.");
            return false;
        }

        if (!numeroMesa || numeroMesa === "") {
            alert("Por favor, seleccione un número de mesa.");
            return false;
        }

        if (!metodoPago || metodoPago === "") {
            alert("Por favor, seleccione un método de pago.");
            return false;
        }

       // Nueva validación para los campos de tarjeta
        if (metodoPago === 'Tarjeta de crédito o debito') {
            let numeroTarjeta = document.getElementById('numero_tarjeta').value;
            let nipTarjeta = document.getElementById('nip_tarjeta').value;

            // Validar que el número de tarjeta tenga 16 dígitos agrupados en grupos de 4 separados por espacios
            if (!numeroTarjeta.match(/^(\d{4} ?){4}$/)) {
                alert("Por favor, ingrese un número de tarjeta válido en el formato 0000 0000 0000 0000.");
                return false;
            }

            // Validar que el NIP tenga exactamente 4 dígitos
            if (!nipTarjeta.match(/^\d{4}$/)) {
                alert("Por favor, ingrese un NIP válido de 4 dígitos.");
                return false;
            }

              // Validar el campo de expiración
                let expirationValue = expirationInput.value.trim();
                if (expirationValue.length !== 5 || !expirationInput.classList.contains('valid')) {
                    alert("Por favor, ingrese una fecha de expiración válida en el formato MM/AA.");
                    return false;
                }
        }

        return true;
    }
                </script>
                <br>
                <label>Comentarios extras del pedido</label>
                <textarea name="comentarios_cantidad" class="inputs_campos altura" maxlength="255"></textarea>
                <br><br>
                <input type="submit" value="Registrar pedido" class="btn_pedido">
                <br><br>
            </form>
        </div>
    </div> <br>

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