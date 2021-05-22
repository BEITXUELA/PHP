<?php 
    require_once('../loader/loader.php');
    require_once('../classes/articulo.php');
    //require_once('classes/articulo.php');
    $Articulo= new Articulo('ident');
    $articulos=$Articulo->leerArticulos();
    $table=$Articulo->getTableAdmin($articulos);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG Admin</title>
        <?php require('../parts/headAdmin.html'); ?>
        <link rel="stylesheet" href="../web/css/login.css">
    </head>
    <body>
        <?php require('../parts/message.php'); ?>

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
        <h2>ADMIN</h2> <br>
        <a href="../index.php" class="btn btn-sm btn-outline-info">Volver</a>

        

        </div>
        <?php 
            echo $table;
         ?>
        <div class="content">
        <form action="adminCrearArticulo.php" method="POST">
            Tema:<input type="text" name="tema"> <br>
            Contenido:<textarea name="contenido" id="" cols="30" rows="10"></textarea>   <br>
            Keywords<input type="text" name="keywords">  <br>
            <input type="submit" value="Crear Artículo">            
        </form>
        </div>
    </body>
</html>