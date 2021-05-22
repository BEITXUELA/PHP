<?php
    require_once('loader/loader.php');
    
    //si el usuario indetificado esta en reset 1 => envio a reset_password.php
    if($_SESSION['user']['reset'] == 1){header('Location: reset_password.php');die;}
    
    if($_SESSION['user']['identificado']){
        $mensaje = $Mensaje->crearMensaje('Ande vas pájaro <br>', 'danger');
        header('Location: index.php'); die;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta</title>
        <?php require('parts/head.html'); ?>
        <link rel="stylesheet" href="web/css/login.css">
    </head>
    <body>
        <?php require('parts/message.php'); ?>

        <div class="content">
            <div class="site" data-site="signup"></div>

            <?php require('parts/signupform.php'); ?>

        </div>

    </body>
</html>