<!---->
<?php 
    require_once('loader/loader.php');
     //si el usuario identificado esta en reset =>1 le envio a reset_password.php
     if ($_SESSION['user']['reset']== 1) {
        header('Location: reset_password.php'); die;
    } //var_dump($reset);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetear clave</title>
    <!-- <link rel="stylesheet" href="web/css/login.css"> -->
    <?php require('parts/head.html');?>
    <link rel="stylesheet" href="web/css/login.css">
</head>

<body>
    <?php 
           require('parts/message.php');
        ?>
    <div class="content">
        <div class="site" data-site="reset"></div>
        <?php echo 'HOLA '.$_SESSION['user']['nombre'].' Bienvenid@! <br>'; ?>
        <h5>Para resetear tu clave ingresa tu email</h5>
        <h6>Y por email recibirás un enlace para recuperar tu clave</h6>
        <form action="actions/resetaction.php" method="POST">
            <table>
                <tr>
                    <th>Escribe tu email </th>
                    <td><input type="email" name="mail"></td>
                </tr>
                <tr>
                    <td><a href="index.php" class="btn btn-sm btn-outline-info">Volver</a></td>
                    <td><input type="submit" class="btn btn-sm btn-outline-success" value="Enviar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>