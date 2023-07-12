<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" href="Estilo.css">
    <link rel="stylesheet" href="EstilosCatalogo.css">
</head>
<body class="bodycatalogo" style="padding: 0; margin: 0 auto;">
    <nav> 
        
        <ul id="barraul">
        <li class="vinculoli"><a href="./indexOP.html">Inicio</a></li>
          <li class="vinculoli"><a href="./catalogoOP.php">Catalogo</a></li>
          <li class="vinculoli"><a href="./CrearOP.html">Añadir producto</a></li>
          <li class="vinculoli"><a href="./UsuariosOP.php">Usuarios</a></li>
          <li class="vinculoli"><a href="./RegistrarUsuariosOP.html">Añadir Usuario</a></li>
          <li class="vinculoli"><a href="./buscarOP.php">Buscar Usuario</a></li>
          <li class="vinculoli"><a href="./index.php">Cerrar sesión</a></li>
        </ul>
    </nav>

    <div class="catalog">
        <?php
          include 'open.php';
          // Cargar datos
          $consulta = "SELECT * FROM productos;";
          $resultado = mysqli_query($con, $consulta);

          // Mostrar los resultados
          foreach ($resultado as $row) {  ?>
            <div class="item">
              <img src="<?php echo $row["img"]?>" alt="<?php echo $row["nombre"]?>">
              <div class="info">
                <h2><?php echo $row["nombre"]?></h2>
                <p><?php echo $row["descripcion"]?></p>
                <span class="price">$<?php echo $row["precio"]?></span>
                <div style="display:flex;">
                  <form action="EditorOP.php" method="post">
                    <input type = "hidden" name = "nombre" value = "<?php echo $row["nombre"]?>" />
                    <input class="btnCatalogo"type="submit" name="Editar" value="Editar" style="background-color: blue;" />
                  </form>
                  <form action="CRUD-control.php" method="post">
                      <input type = "hidden" name = "nombre" value = "<?php echo $row["nombre"]?>" />
                      <input class="btnCatalogo"type="submit" name="Borrar" value="Borrar" />
                  </form>
                </div>
              </div>
            </div>
            <?php
          }
        ?>
      </div>

</body>
</html>