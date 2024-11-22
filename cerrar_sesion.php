<?php
    require "seguridad.php";
    session_start();
    session_destroy();
    // echo '
    //     <script>
    //         alert("AHORA YA SALISTE DEL DASHBOARD");
    //         location.href = "index.php";
    //     </script>
    // ';

    header("Location: index.php");
?>