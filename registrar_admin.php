<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de administrador</title>
    <link rel="stylesheet" href="style_panel_admin.css">
</head>

<body>
    <div class="ancho centrar">
        <a href="index.php"><img class="logo_colon" src="./img/logo_colon.png"></a>
    </div>

    <div class="ancho centrar">
        <div class="contenedor1">
            <form action="guardar_admin_login.php" method="POST" autocomplete="off">
                <br><br>
                <h1>Registrar Administrador</h1>

                <input class="campos_login" type="text" placeholder="Nombre Completo" name="nombre" required>
                <br><br>

                <input class="campos_login" type="text" placeholder="Correo Electronico" name="correo" required>
                <br><br>

                <input class="campos_login" type="text" placeholder="Contraseña" name="contrasena" required>
                <br><br>

                <input class="campos_login" type="date" name="fecha_nacimiento" required>
                <br><br>

                <input class="campos_login" type="text" placeholder="Número de teléfono" name="telefono" maxlength="9" required>
                <br><br>

                <input type="submit" value="Registrar" class="btn_iniciar_sesion">
                <br><br>
            </form>
        </div>
    </div>
    <br><br>
</body>

</html>