<?php

    require "conexion.php";

    $nombre = addslashes($_POST['nombre']);
    $correo = addslashes($_POST['correo']);
    $contrasena = addslashes($_POST['contrasena']);
    $fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);
    $telefono = addslashes($_POST['telefono']);

    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    //Validar usuario

    $verificar_usuario = mysqli_query($conectar, "SELECT * FROM administradores WHERE correo = '$correo'");
    if (mysqli_num_rows($verificar_usuario)>0) {
        echo '
        <script>
            alert ("Este correo ya esta registrado. Intente con otro.");
            location.href="registrar_admin_panel.php";
          </script>
        '; exit;
    }

    //Insertar datos

    $insertar = "INSERT INTO administradores (nombre, correo, contrasena, fecha_nacimiento, telefono) VALUES ('$nombre', '$correo', '$contrasena_encriptada', '$fecha_nacimiento', '$telefono')";
    $query = mysqli_query($conectar, $insertar);

    if ($query) {
        echo
        '<script>
            alert ("Se ha registrado este administrador.");
            location.href="registrar_admin_panel.php";
          </script>';
      } else {
        echo
        '<script>
            alert ("Error. Intente otra vez.");
            window.history.go(-1);
          </script>'; exit;
      }

?>