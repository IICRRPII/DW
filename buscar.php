<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Estilo.css">
    <style>
      body {
        font-family: Arial, sans-serif;
        text-align: center;
      }
      
      form {
        display: inline-block;
        text-align: center;
        margin: 20px auto;
      }
      
      input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
      }
      
      input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        cursor: pointer;
      }
  </style>
</head>


<body class="Index">
   
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
    
    <div id="TituloIndex">
        <h1 id="Titulo1">R&B OPTICAL</h1>
    </div>

        <form action="buscar.php" method="POST">
            <input type="text" id="busqueda" name="busqueda" placeholder="Ingresa tu bùsqueda...">
            <input type="submit" value="buscar">
        </form>

        <div class="container">
            <div class="catalog">
        
                <?php
                  // Cargar datos
                  include 'open.php';
                  $busqueda = "";
                  if(isset($_POST["busqueda"]))
                    $busqueda = $_POST["busqueda"];
                
                  $consulta = "SELECT * FROM productos WHERE nombre = '$busqueda';";
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
        </div>

    </body>
</html>