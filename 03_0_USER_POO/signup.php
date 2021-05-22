<?php 
    //session_start(); 
    require_once('loader/loader.php');
    // require_once('functions/session.php');
    // comenzarSesion();//var_dump($params);
    // $ident=$params['ident'];
    // $usuario=$params['usuario'];
    //$reset=$params['reset'];
    //si el usuario identificado esta en reset =>1 le envio a reset_password.php
    if ($_SESSION['user']['reset']== 1) {
        header('Location: reset_password.php'); die;
    } //var_dump($reset);
    if ($_SESSION['user']['identificado']== true) {
        $mensaje= $Mensaje->crearMensaje('Ande vas pájaro!!!','danger');
        header('Location: index.php'); die;
    } 
    //$mensaje=usarMensajes();
    //var_dump($mensaje);
    
    //para no dejarle una vez logado que vaya a resgitrarse:
    //evitar q un usuario registrado se vuelva a registrar
    
        // $_SESSION['mensaje']['texto']= 'Ande vas pájaro!!!';
        // $_SESSION['mensaje']['tipo']= 'danger';
           
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta</title>
        <link rel="stylesheet" href="web/css/login.css">
        <?php require('parts/head.html'); ?>
    </head>

    <body>
        <?php 
           require('parts/message.php');
        ?>
        <div class="content">
            <div class="site" data-site="signup"></div>
            <?php require('parts/signupform.php'); ?>
            
        </div>
    </body>
</html>