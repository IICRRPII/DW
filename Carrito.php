<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="Estilo.css">
    <link rel="stylesheet" href="EstiloCarrito.css">
    
</head>
<body class="bodycarro" style="margin:0;">

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
    <h2 id="CarritoText">Carrito</h2>
   <div class="CamponentesCarrito">
   
   <?php 
    session_start();
    if(isset($_SESSION["carrito"])) {
      foreach($_SESSION['carrito'] as $item) {
        if(!$item['precio']) continue;
        ?>
          <div class="cart-item">
          <img src="<?php echo $item['img']?>" alt="<?php echo $item['nombre']?>">
          <h3><?php echo $item['nombre']?></h3>
          <p>Precio: $<?php echo $item['precio']?></p>
          <form action="CONTROL-carrito.php" method="post">
            <input type = "hidden" name = "nombre" value = "<?php echo $item["nombre"]?>" />
            <input type="submit"class="remove-btn" value="Eliminar">
          </form>
          </div>
        <?php 
        }
      }

    ?>
     
      <button class="pay-btn" onclick="redireccionar()">Pagar</button>

      <script>
          function redireccionar() {
            window.location.href = "CorreoCarrito.html";
          }
      </script>
                
   </div>
    
    

</body>
</html>