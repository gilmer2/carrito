<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "coco";
    $conexion = mysqli_connect($server, $user, $pass, $db);
    if (!$conexion) {
        echo 'Error al conectar a la base de datos';
    }
?>