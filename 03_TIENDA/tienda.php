<?php 
    require_once('loader/loader.php');
    require_once('classes/producto.php');
    //require_once('classes/articulo.php');
    $Producto= new Producto('ident');
    $productos=$Producto->leerProductos();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TIENDA</title>
        <?php require('parts/head.html'); ?>
        <link rel="stylesheet" href="web/css/login.css">
    </head>
    <body>
        <?php require('parts/loginform.php'); ?>
        <?php require('parts/message.php'); ?>

        <div class="content">
            <div class="site" data-site="index"></div>
            <h5>  
                <?php 
                    if($_SESSION['user']['identificado']){
                    echo 'Hola '.$_SESSION['user']['nombre']; echo ' eres: '.$_SESSION['user']['role'];
                    }
                ?>
            </h5>
        </div> 

        <div class="content">
        <h2>Mi Tienda</h2> <br>
        <a href="index.php" class="btn btn-sm btn-outline-info">Volver</a>

        <a href="tienda.php" class="btn btn-sm btn-outline-dark">Mostrar Productos de la Tienda</a>
        <ul>
            <?php 
                foreach ($productos as $key => $producto) {
                    foreach ($producto as $key => $value) {
                        echo '<li>'.$key.'=>'.$value.'</li>';
                    }
                }
            ?>
        </ul>
        </div>
    </body>
</html>