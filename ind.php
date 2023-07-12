<?php

include 'open.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


$SQL = mysqli_query($con, "INSERT INTO `usuarios`(`usuario`, `contrasena`, `admin`) VALUES ('$usuario','$contrasena','0')");

if ($SQL){
   header("location: InicioSesion.html");
}

?>