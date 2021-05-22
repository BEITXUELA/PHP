<?php 
    session_start(); 
    require_once('functions/session.php');
    comenzarSesion();//var_dump($params);
    // $ident=$params['ident'];
    // $usuario=$params['usuario'];
    // $reset=$params['reset'];

    $mensaje=usarMensajes();
    //var_dump($mensaje);
     //si el usuario identificado esta en reset =>1 le envio a reset_password.php
     if ($_SESSION['reset']== 1) {
        header('Location: reset_password.php'); die;
    } //var_dump($reset);

    //para no dejarle una vez logado que vaya a resgitrarse:
    if ($_SESSION['identificado']== true) {
        $_SESSION['mensaje']['texto']= 'Ande vas pájaro!!!';
        $_SESSION['mensaje']['tipo']= 'danger';
        header('Location: index.php'); die;
    } 
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