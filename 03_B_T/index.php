<?php 
    require_once('loader/loader.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer BLOG</title>
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
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tienda.php">Tienda</a>
            </li>
        </ul>
    </div>

</body>

</html>