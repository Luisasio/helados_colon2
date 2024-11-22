<?php
session_start();
if ($_SESSION["autentificado"] != "SI") {
    echo '
    <script>
        location.href = "index.php";
    </script>
    ';
}

?>