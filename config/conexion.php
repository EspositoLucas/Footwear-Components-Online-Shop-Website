<?php
    $host = "localhost";
    $user = "id20358835_fondos_totys";
    $clave = "Zrz%u%-r3_J*b=kf";
    $bd = "id20358835_compra_online_fondos";
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");
