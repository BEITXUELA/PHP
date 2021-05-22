<?php 
    //comenzar sesión   
    session_start();
    require_once('../functions/session.php');
    $ident=$_SESSION['identificado']; //var_dump($ident); die;
    //si el usuario intenta entrar sin logar(a capon en el explorador) lo mandamos a index siempre
    if ($ident ==false) {
        header('Location:../index.php');die;
    }
    //comprobar el rol del usuario:
        if ($_SESSION['role']!='admin') {
            header('Location: ../backend/perfil.php'); die;
    }
    $mensaje=usarMensajes();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <?php require('parts/head.html'); ?>
</head>

<body>
    <?php require('parts/adminMenu.php');?>
    <?php require('../parts/message.php');?>

    <div class="content">
        <div class="site" data-site="admin"></div>
        <?php echo 'HOLA '.$_SESSION['nombre'].' Bienvenid@! admin eres diox<br>'; ?>

    </div>
    <ul>
            <li>gestion usuarios CRUD</li>
            <li>gestión componentes de la web x ej blog/shop/events</li>
            <li></li>
            <li></li>
            <li></li>
    </ul>
</body>

</html>