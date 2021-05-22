<?php 
    require_once('loader/loader.php');//con este loader podemos quitar los require_once ya ke se cargan en el loader.php

    //unset($_SESSION['user']['identificado']); die;
    //clase de session
    //require_once('classes/session.php');
    //var_dump($Session);
     // $Session->comenzarSession();
    //var_dump($Session);
    //clase mensajes
    //require_once('classes/mensajes.php');

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio POO</title>
        <link rel="stylesheet" href="web/css/login.css">
        <?php require('parts/head.html'); ?>
    </head>

    <body>

    <?php require('parts/loginform.php');?>
    <?php require('parts/message.php');?>
        <div class="content">
            <div class="site" data-site="index"></div>       
            <?php
            if ($_SESSION['user']['identificado']==true) {
                echo 'HOLA '.$_SESSION['user']['nombre'].' Bienvenid@! <br>'; 
                echo 'Eres '.$_SESSION['user']['role'];
            }?>
        </div>
    </body>
</html>