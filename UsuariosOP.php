<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
          $consulta = "SELECT * FROM usuarios;";
          $resultado = mysqli_query($con, $consulta);

          // Mostrar los resultados
          foreach ($resultado as $row) {  ?>
            <div class="item">
              <div class="info">
                <h2>Nombre: <?php echo $row["usuario"]?></h2>
                <p>Contraseña: <?php echo $row["contrasena"]?></p>
                <div style="display:flex;">
                  <form action="EditorUsuarioOP.php" method="post">
                    <input type = "hidden" name="usuario" value="<?php echo $row["usuario"]?>" />
                    <input class="btnCatalogo"type="submit" name="Editar" value="Editar" style="background-color: blue;" />
                  </form>
                  <form action="CRUD-control.php" method="post">
                      <input type = "hidden" name="usuario" value = "<?php echo $row["usuario"]?>" />
                      <input class="btnCatalogo"type="submit" name="BorrarUsuario" value="Borrar" />
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