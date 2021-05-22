<?php 
    //primero conexion al servidor para poder crear la BBDD
    $conn_servidor= mysqli_connect('localhost','root','','','3306');
    echo $conn_servidor?'<p>conectado</p>':'<p>sin conexion</p>';
    mysqli_query($conn_servidor,"CREATE DATABASE `phptest`");
    mysqli_close($conn_servidor);


    function ejecutarSQL($query){
        //primer paso -conexion
        $conn_base= mysqli_connect('localhost','root','','phptest','3306');
        echo $conn_base?'<p>conectado</p>':'<p>sin conexion</p>';
        mysqli_query($conn_base,$query);
         //último paso - desconexion
         mysqli_close($conn_base);
    }

//     function crearBase($nombre){
//          //primer paso -conexion
//          $conn= mysqli_connect('localhost','root','','phpbase','3306');
//          echo $conn?'<p>conectado</p>':'<p>sin conexion</p>';
//          //segundo paso - enviar un query
//          $query="CREATE DATABASE `$nombre`";
//          mysqli_query($conn,$query);

//          //último paso - desconexion
//          mysqli_close($conn);
//     }

//     function borrarBase($nombre){
//         //primer paso -conexion
//         $conn= mysqli_connect('localhost','root','','phpbase','3306');
//         echo $conn?'<p>conectado</p>':'<p>sin conexion</p>';
//         //segundo paso - enviar un query
//         $query="DROP DATABASE `$nombre`";
//         mysqli_query($conn,$query);

//         //último paso - desconexion
//         mysqli_close($conn);
//    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php BBDD crear</title>
    <?php require('parts/head.html'); ?>
</head>

<body>
    <div data-site=".base" class="site"></div>

    <?php require_once('parts/header.html'); ?>
    <?php include_once('parts/menu.html'); ?>

    <div class="block">
        <h2>Base de datos - php - crear - conectar</h2>
        <h3>Crear una base de datos</h3>
        <p>
            Crear bbdd con: $query="CREATE DATABASE `phptest`"; <br>
            Si repetimos no crea una segunda base.

        </p>
        <p>
            Primer paso - conexion - con mysqli_connect
        </p>
        <?php 
            //$query= "CREATE DATABASE `phptest`";
            //ejecutarSQL($query);

            $query = "CREATE TABLE `phptest`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            ejecutarSQL($query);

            $query="ALTER TABLE `usuarios` ADD `nombre` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `id`"; 
            ejecutarSQL($query);

            $query="ALTER TABLE `usuarios` ADD `apellido` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `nombre`"; 
            ejecutarSQL($query);

            $query="ALTER TABLE `usuarios` ADD `mail` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER `apellido`"; 
            ejecutarSQL($query);

            
            $query="DROP DATABASE `phptest`";
           // ejecutarSQL($query);

            //crearBase($nombre='phptest');
            // borrarBase($nombre='phptest');
            
        ?>
    </div>


    <footer></footer>
</body>

</html>