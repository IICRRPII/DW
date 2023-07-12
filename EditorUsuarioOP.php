<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="EstiloRegUserOP.css">

</head>
<body>

    <?php
        include 'open.php';
        $usuario = $_POST['usuario'];
        // Cargar datos
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario';";
        $resultado = mysqli_query($con, $consulta);
        foreach ($resultado as $row) { 
    ?>

    <form action="CRUD-control.php" method="post">
            
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo $row['usuario'] ?>"><br><br>
            
            <label for="password">Contraseña:</label>
            <input type="text" id="contrasena" name="contrasena" value="<?php echo $row['contrasena'] ?>"><br><br>
            
            <input type = "hidden" name="oldUsuario" value="<?php echo $row["usuario"]?>" />
            <input type="submit" name="EditarUsuario" value="Editar Usuario">
            
    </form>

    <?php
        break;
        }
    ?>
        
</body>
</html>