<?php
require "conexion.php";

// Capturamos los datos enviados desde el formulario
$id = $_POST['id'];
$nombre_empleado = addslashes($_POST['nombre_empleado']);
$correo_empleado = addslashes($_POST['correo_empleado']);
$fecha_nacimiento_empleado = addslashes($_POST['fecha_nacimiento_empleado']);
$telefono_empleado = addslashes($_POST['telefono_empleado']);
$horas_trabajo = addslashes($_POST['horas_trabajo']);

// Verificar si el array de días de trabajo está definido y convertirlo en una cadena separada por comas
if (isset($_POST['dias_trabajo'])) {
    $dias_trabajo = implode(",", $_POST['dias_trabajo']);
} else {
    $dias_trabajo = "";  // Si no se seleccionaron días, dejamos la cadena vacía
}

// Consulta para actualizar los datos del empleado en la tabla "empleados"
$actualizar = "UPDATE empleados SET 
                nombre_empleado='$nombre_empleado', 
                correo_empleado='$correo_empleado', 
                fecha_nacimiento_empleado='$fecha_nacimiento_empleado', 
                telefono_empleado='$telefono_empleado', 
                horas_trabajo='$horas_trabajo', 
                dias_trabajo='$dias_trabajo' 
              WHERE id_empleado='$id'";

// Ejecutar la consulta
$query = mysqli_query($conectar, $actualizar);

// Verificar si la consulta se ejecutó correctamente
if ($query) {
    echo
    '<script>
        alert("Se editó el empleado correctamente.");
        location.href="ver_empleado.php?id='.$id.'";
      </script>';
} else {
    echo
    '<script>
        alert("Error. Intente otra vez.");
        location.href="editar_empleado.php?id='.$id.'";
      </script>';
    exit;
}
?>
