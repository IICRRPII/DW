<?php
include 'open.php';

    //  Eliminar elemento
    function deleteItem($nombre, $con) {
        $query = "DELETE FROM productos WHERE nombre='$nombre'";
        mysqli_query($con, $query);
        header("Location: http://localhost/DW/catalogoOP.php");
    }

    function editItem($nombre, $img, $precio, $stock, $descripcion, $oldNombre, $con) {
        $query = "UPDATE productos SET nombre='$nombre', img='$img', precio='$precio', descripcion='$descripcion', stock='$stock' WHERE nombre='$oldNombre';";
        // var_dump($query);
        mysqli_query($con, $query);
        header("Location: http://localhost/DW/catalogoOP.php");
    }
    
    function createItem($nombre, $img, $precio, $stock, $descripcion, $con) {
        $query = "INSERT INTO productos (img, nombre, descripcion, precio, stock) VALUES ('$img', '$nombre', '$descripcion', '$precio', '$stock');";
        mysqli_query($con, $query);
        header("Location: http://localhost/DW/catalogoOP.php");
    }
    
    function createUser($usuario, $contrasena, $con) {
        $query = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena');";
        mysqli_query($con, $query);
        var_dump($query);
        header("Location: http://localhost/DW/UsuariosOP.php");
    }
    
    function deleteUser($usuario, $con) {
        $query = "DELETE FROM usuarios WHERE usuario='$usuario';";
        mysqli_query($con, $query);
        header("Location: http://localhost/DW/UsuariosOP.php");
    }
    
    function editUser($usuario, $contrasena, $oldUsuario, $con) {
        $query = "UPDATE usuarios SET usuario='$usuario', contrasena='$contrasena' WHERE usuario='$oldUsuario';";
        // var_dump($query);
        mysqli_query($con, $query);
        header("Location: http://localhost/DW/UsuariosOP.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Borrar'])) {
        deleteItem($_POST['nombre'], $con);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Editar'])) {
        editItem($_POST['nombre'], $_POST['img'], $_POST['precio'], $_POST['stock'], $_POST['descripcion'], $_POST['oldNombre'], $con);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Crear'])) {
        createItem($_POST['nombre'], $_POST['img'], $_POST['precio'], $_POST['stock'], $_POST['descripcion'], $con);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['RegistrarUsuario'])) {
        createUser($_POST['usuario'], $_POST['contrasena'], $con);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['BorrarUsuario'])) {
        deleteUser($_POST['usuario'], $con);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EditarUsuario'])) {
        editUser($_POST['usuario'], $_POST['contrasena'], $_POST['oldUsuario'], $con);
    }

?>