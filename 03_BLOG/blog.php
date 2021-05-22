<?php 
    require_once('loader/loader.php');
    require_once('classes/articulo.php');
    //require_once('classes/articulo.php');
    $Articulo= new Articulo('ident');
    $articulos=$Articulo->leerArticulos();
    $table=$Articulo->getTable($articulos);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG</title>
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
        //  $table = "<table>";
        //  $table.="<tr><th>ID</th><th>TEMA</th><th>CONTENIDO</th><th>KEYWORDS</th></tr>";
        //  foreach ($articulos as $key => $miarticulo) { 
        //     echo '<pre>';
        //     //var_dump($miarticulo);
        //     echo '</pre>';
        //      $table.="<tr>";
        //      $table.="<td>$miarticulo[id]</td>";
        //      $table.="<td>$miarticulo[tema]</td>";
        //      $table.="<td>$miarticulo[contenido]</td>";
        //      $table.="<td>$miarticulo[keywords]</td>";
        //      $table.="</tr>";
        //  }
        //  $table.= "</table>";
         ?>

        <?php 

        echo '<h4>Tabla:</h4>'.$table.'<br>';
                echo '<h4>Lista:</h4>';
                foreach ($articulos as $key => $miarticulo) {
                    foreach ($miarticulo as $key => $value) {
                        echo '<li>'.$key.'=>'.$value.'</li>';
                    }
                }
            ?>
        </div>
       
    </body>
</html>