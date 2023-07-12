<?php session_start(); 

    if(isset($_POST['Eliminar'])) {
        $nombre = $_POST['nombre'];
        if(isset($_SESSION['carrito'][$nombre])) {
            unset($_SESSION['carrito'][$nombre]);
        }
    }
    elseif(isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $img = $_POST['img'];
        $precio = $_POST['precio'];

        $_SESSION["carrito"][$nombre]["nombre"] = $nombre;
        $_SESSION["carrito"][$nombre]["img"] = $img;
        $_SESSION["carrito"][$nombre]["precio"] = $precio;

    }

    var_dump($_SESSION["carrito"]);
    
    header('Location: http://localhost/DW/Carrito.php');

?>