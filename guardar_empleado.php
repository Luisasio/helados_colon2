<?php

    require "conexion.php";

    $nombre_empleado = addslashes($_POST['nombre_empleado']);
    $correo_empleado = addslashes($_POST['correo_empleado']);
    $fecha_nacimiento_empleado = addslashes($_POST['fecha_nacimiento_empleado']);
    $telefono_empleado = addslashes($_POST['telefono_empleado']);
    $horas_trabajo = addslashes($_POST['horas_trabajo']);

    // Aquí verificamos si el array de los días de trabajo está definido
    if (isset($_POST['dias_trabajo'])) {
        // Concatenar los valores del array en una cadena separada por comas
        $dias_trabajo = implode(",", $_POST['dias_trabajo']);
    } else {
        $dias_trabajo = "";  // Si no se seleccionó ningún día, la cadena será vacía
    }

    // Verificar si el correo ya está registrado
    $verificar_usuario = mysqli_query($conectar, "SELECT * FROM empleados WHERE correo_empleado = '$correo_empleado'");
    if (mysqli_num_rows($verificar_usuario) > 0) {
        echo '
        <script>
            alert ("Este correo ya está registrado. Intente con otro.");
            location.href="registrar_empleado.php";
        </script>';
        exit;
    }

    // Insertar datos incluyendo los días de trabajo concatenados
    $insertar = "INSERT INTO empleados (nombre_empleado, correo_empleado, fecha_nacimiento_empleado, telefono_empleado, dias_trabajo, horas_trabajo)
                 VALUES ('$nombre_empleado', '$correo_empleado', '$fecha_nacimiento_empleado', '$telefono_empleado', '$dias_trabajo', '$horas_trabajo')";
    $query = mysqli_query($conectar, $insertar);

    if ($query) {
        echo '
        <script>
            alert ("Se ha registrado el empleado");
            location.href="registrar_empleado.php";
        </script>';
    } else {
        echo '
        <script>
            alert ("Error. Intente otra vez.");
            window.history.go(-1);
        </script>';
        exit;
    }

?>
