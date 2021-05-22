<?php 
    require_once('loader/loader.php');
    require_once('classes/articulo.php');
    //require_once('classes/articulo.php');
    $Articulo= new Articulo('ident');
    $unarticulo=$Articulo->leerUnArticulo($_GET['id']);
    $table=$Articulo->getTable($unarticulo);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tema BLOG</title>
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
        <h2>Mi Blog</h2> <br>
        <a href="index.php" class="btn btn-sm btn-outline-info">Volver</a>

        <a href="blog.php" class="btn btn-sm btn-outline-dark">Mostrar Artículos del Blog</a>
    
         <?php 
            echo $table;
         ?>
                    
        </div>
       
    </body>
</html>