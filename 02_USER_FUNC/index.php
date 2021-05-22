<?php 
    session_start(); 
    require_once('functions/session.php');
    comenzarSesion();//var_dump($_SESSION['role']);
    // $ident=$params['ident'];
    // $usuario=$params['usuario'];
    // $reset=$params['reset'];

    $mensaje=usarMensajes();
    //var_dump($mensaje);

    //si el usuario identificado esta en reset =>1 le envio a reset_password.php
    if ($_SESSION['reset']== 1) {
        header('Location: reset_password.php'); die;
    } //var_dump($reset);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio Log y sign BBDD aviso PRO</title>
        <link rel="stylesheet" href="web/css/login.css">
        <?php require('parts/head.html'); ?>
    </head>

    <body>

    <?php require('parts/loginform.php');?>
    <?php require('parts/message.php');?>
        <!--// 
        //if ($mensaje!=''){require('parts/message.php');}
        // ?> -->
        <div class="content">
            <div class="site" data-site="index"></div>       
            <?php
            if ($_SESSION['identificado']==true) {
                echo 'HOLA '.$_SESSION['nombre'].' Bienvenid@! <br>'; 
                echo 'Eres '.$_SESSION['role'];
            }?>
        </div>
    </body>
</html>