<?php
require "conexion.php";

// Verificar si se recibió el POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Error: No se recibieron datos POST");
}

// Debug - Ver todos los datos recibidos
error_log("Datos POST recibidos: " . print_r($_POST, true));

// Verificar que los campos requeridos existen
$required_fields = ['nombre_cliente_pedido', 'correo_cliente_pedido', 'telefono_cliente_pedido', 'numero_mesa', 'metodo_pago', 'numero_tarjeta', 'nip_tarjeta'];
foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        die("Error: Campo requerido '$field' está vacío o no existe");
    }
}

// Recoger los datos del formulario
$nombre_cliente_pedido = addslashes($_POST['nombre_cliente_pedido']);
$correo_cliente_pedido = addslashes($_POST['correo_cliente_pedido']);
$telefono_cliente_pedido = addslashes($_POST['telefono_cliente_pedido']);
$numero_mesa = addslashes($_POST['numero_mesa']);
$metodo_pago = addslashes($_POST['metodo_pago']);
$numero_tarjeta = addslashes($_POST['numero_tarjeta']);
$nip_tarjeta = addslashes($_POST['nip_tarjeta']);
$comentarios_cantidad = addslashes($_POST['comentarios_cantidad'] ?? '');

// Validar si el número de tarjeta y el NIP existen en la base de datos
// Validar si el número de tarjeta y el NIP existen en la base de datos
$consulta_tarjeta = "SELECT * FROM tarjetas WHERE numero_tarjeta = '$numero_tarjeta' LIMIT 1";
$resultado_tarjeta = mysqli_query($conectar, $consulta_tarjeta);

if (mysqli_num_rows($resultado_tarjeta) > 0) {
    $fila_tarjeta = $resultado_tarjeta->fetch_array();

    // Verificar si el NIP coincide (comparación directa)
    if ($nip_tarjeta !== $fila_tarjeta['nip_tarjeta']) {
        die("Error: El NIP ingresado no es correcto.");
    }
} else {
    die("Error: La tarjeta no está registrada en el sistema.");
}


// Inicializamos una variable para almacenar los dulces y helados seleccionados con cantidades
$pedidos_cliente_pedidos = "";

// Procesar los dulces seleccionados
if (!empty($_POST['dulces'])) {
    $dulces_con_cantidades = [];
    foreach ($_POST['dulces'] as $dulce) {
        $campo_dulce = 'cantidad_' . str_replace(' ', '_', $dulce);
        if (isset($_POST[$campo_dulce]) && $_POST[$campo_dulce] !== '') {
            $dulces_con_cantidades[] = $dulce . "=" . addslashes($_POST[$campo_dulce]);
        }
    }
    if (!empty($dulces_con_cantidades)) {
        $pedidos_cliente_pedidos .= "Dulces: " . implode(", ", $dulces_con_cantidades) . "; ";
    }
}

// Procesar los helados seleccionados
if (!empty($_POST['helados'])) {
    $helados_con_cantidades = [];
    foreach ($_POST['helados'] as $helado) {
        $campo_helado = 'cantidad_' . str_replace(' ', '_', $helado);
        if (isset($_POST[$campo_helado]) && $_POST[$campo_helado] !== '') {
            $helados_con_cantidades[] = $helado . "=" . addslashes($_POST[$campo_helado]);
        }
    }
    if (!empty($helados_con_cantidades)) {
        $pedidos_cliente_pedidos .= "Helados: " . implode(", ", $helados_con_cantidades) . "; ";
    }
}

// Insertar el pedido en la base de datos
$insertar_pedido = "INSERT INTO pedidos (nombre_cliente_pedido, correo_cliente_pedido, telefono_cliente_pedido, numero_mesa, metodo_pago, comentarios_cantidad, pedido_cliente_pedido, numero_tarjeta, nip_tarjeta)
                    VALUES ('$nombre_cliente_pedido','$correo_cliente_pedido', '$telefono_cliente_pedido', '$numero_mesa', '$metodo_pago', '$comentarios_cantidad', '$pedidos_cliente_pedidos', '$numero_tarjeta', '$nip_tarjeta')";
error_log("Consulta SQL a ejecutar: " . $insertar_pedido);

// Ejecutar la consulta y capturar cualquier error
$query_pedido = mysqli_query($conectar, $insertar_pedido);
if (!$query_pedido) {
    error_log("Error MySQL: " . mysqli_error($conectar));
    die("Error en la consulta SQL: " . mysqli_error($conectar));
}

// Verificar si la inserción fue exitosa y mostrar alerta
if ($query_pedido) {
    echo '<script>
        alert("Se ha registrado el pedido correctamente");
        window.location.href = "pedidos_landing.php";
    </script>';
} else {
    echo '<script>
        alert("Error al registrar el pedido. Por favor, intente nuevamente.");
        window.history.go(-1);
    </script>';
}

mysqli_free_result($resultado_tarjeta);
mysqli_close($conectar);
?>
