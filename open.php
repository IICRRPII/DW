<?php
    $server  = "localhost";
    $username = "root";
    $passwd = "";
    $database = "randboptical";
    $con = mysqli_connect($server, $username, $passwd, $database);

    if(!$con){
        echo "Error al conectar";
    }
?>