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

            <div class="contenedor5 ">
                <div class="centrar">
                    <img src="./img/logo_colon.png" class="logopaneladmin1">
                    <br><br>
                    <a href="dulces.php" class="btn_regresar"> &lt;&lt;&lt; Regresar</a>
                </div>

                <div class="ancho contenedor6">
                    <form action="guardar_dulce.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <p class="negritas">Porfavor, llene los siguientes campos*:</p>

                        <input class="campos_login" type="text" placeholder="Nombre del dulce*" name="dulce" required>
                        <br><br>
                        <label for="">El peso de la imagen no puede exeder 1MB*</label>
                        <input class="campos_login" type="file" name="imagen" required>
                        <br><br>

                        <textarea name="descripcion" class="campos_login" placeholder="Descripción*"></textarea>
                        <br><br>

                        <input class="campos_login" 
                               type="text" 
                               id="precio"
                               placeholder="Precio del dulce*" 
                               name="precio" 
                               onkeydown="return soloNumeros(event)"
                               required>
                        <br><br>

                        <?php
                        // Generar código aleatorio de 9 dígitos
                        $codigo = str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT);
                        ?>
                        
                        <input type="text" class="campos_login" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                        <br><br>

                        <button class="registrar_admin">Registrar dulce</button>
                        
                        <br><br>
                        <hr>
                    </form>
                </div>
                <br><br>
            </div>
            <br>
        </div>
    </div>

    <style>
        input[readonly] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
    </style>

    <script>
        function soloNumeros(event) {
            // Obtener el código de la tecla presionada
            const keyCode = event.which || event.keyCode;
            const tecla = event.key;
            
            // Permitir teclas de control (backspace, delete, flechas, etc)
            if (event.ctrlKey || event.altKey || keyCode < 32) {
                return true;
            }
            
            // Permitir solo números y un punto decimal
            if (/^[0-9.]$/.test(tecla)) {
                const input = event.target;
                const valor = input.value;
                
                // Si es un punto decimal
                if (tecla === '.') {
                    // No permitir más de un punto decimal
                    if (valor.includes('.')) {
                        return false;
                    }
                }
                
                return true;
            }
            
            // Bloquear cualquier otra tecla
            return false;
        }

        // Validar el formulario antes de enviarlo
        document.querySelector('form').onsubmit = function(e) {
            let precio = document.getElementById('precio').value;
            if (precio === '' || parseFloat(precio) <= 0) {
                alert('Por favor, ingrese un precio válido mayor a 0');
                e.preventDefault();
                return false;
            }
            return true;
        };
    </script>

</body>
</html>