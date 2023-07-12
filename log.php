<?php

include 'open.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena';";
$resultado = mysqli_query($con, $consulta);

foreach ($resultado as $row) {
    if($row['admin'] == 0) header("location: index.php");
    else header("location: indexOP.html");
}

?>