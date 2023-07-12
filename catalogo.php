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
            <li class="vinculoli"><a href="./index.php">Inicio</a></li>
            <li class="vinculoli"><a href="./catalogo.php">Catalogo</a></li>
            <li class="vinculoli"><a href="./sucursales.html">Sucursales</a></li>
            <li class="vinculoli"><a href="./Carrito.php">Carrito</a></li>
            <li class="vinculoli"><a href="./buscar.php">Buscar</a></li>
            <li class="vinculoli"><a href="./InicioSesion.html">Iniciar Sesion</a></li>
        </ul>
    </nav>


    <div class="catalog">

        <?php
          // Cargar datos
          include 'open.php';
          $consulta = "SELECT * FROM productos;";
          $resultado = mysqli_query($con, $consulta);

          // Mostrar los resultados
          foreach ($resultado as $row) {
            if($row["stock"] == 0) continue;  ?>
            <div class="item">
              <img src="<?php echo $row["img"]?>" alt="<?php echo $row["nombre"]?>">
              <div class="info">
                <h2><?php echo $row["nombre"]?></h2>
                <p><?php echo $row["descripcion"]?></p>
                <span class="price">$<?php echo $row["precio"]?></span>
                <form action="CONTROL-carrito.php" method="post">
                  <input type = "hidden" name = "nombre" value = "<?php echo $row["nombre"]?>" />
                  <input type = "hidden" name = "precio" value = "<?php echo $row["precio"]?>" />
                  <input type = "hidden" name = "img" value = "<?php echo $row["img"]?>" />
                  <input type="submit" value="Agregar al carrito" class="btnCatalogo">
                </form>
              </div>
            </div>
            <?php
          }
        ?>
        </div>

</body>
</html>