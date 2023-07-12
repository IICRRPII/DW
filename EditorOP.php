<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edtiar producto</title>
    <link rel="stylesheet" href="Estilo.css">
    <link rel="stylesheet" href="EstiloEditor.css">
</head>
<body id="EditorBody">
    <nav> 
        
        <ul id="barraul">
        <li class="vinculoli"><a href="./indexOP.html">Inicio</a></li>
          <li class="vinculoli"><a href="./catalogoOP.php">Catalogo</a></li>
          <li class="vinculoli"><a href="./CrearOP.html">Añadir producto</a></li>
          <li class="vinculoli"><a href="./UsuariosOP.php">Usuarios</a></li>
          <li class="vinculoli"><a href="./RegistrarUsuariosOP.html">Añadir Usuario</a></li>
          <li class="vinculoli"><a href="./index.php">Cerrar sesión</a></li>
          <li class="vinculoli"><a href="./buscarOP.php">Buscar Usuario</a></li>
        </ul>
    </nav>

    <?php
        include 'open.php';
        $nombre = $_POST['nombre'];
        // Cargar datos
        $consulta = "SELECT * FROM productos WHERE nombre='$nombre';";
        $resultado = mysqli_query($con, $consulta);
        foreach ($resultado as $row) { 
    ?>

    <div id="TituloEditor">
        <h1>Editar y agregar articulos</h1>
    </div>

    <form action="CRUD-control.php" method="post">
		<label for="nombre">Nombre del producto:</label><br>
        <input type="hidden" name="oldNombre" value="<?php echo $row['nombre']?>" />
		<input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>"><br>

		<label for="precio">Precio:</label><br>
		<input type="number" id="precio" name="precio" value="<?php echo $row['precio'] ?>"><br>

		<label for="stock">Stock:</label><br>
		<input type="number" id="stock" name="stock" value="<?php echo $row['stock'] ?>"><br>

		<label for="descripcion">Descripción:</label><br>
		<input type="text" id="descripcion" name="descripcion" value="<?php echo $row['descripcion'] ?>"></input><br>

		<label for="imagen">Imagen:</label><br>
		<input type="text" id="img" name="img" value="<?php echo $row['img'] ?>"><br><br>

        <div id="BEOsend">
            <input type="submit" name="Editar" value="Editar">
        </div>
	</form>
    <?php
        break;
        }
    ?>
    
</body>
</html>