<?php
    require_once('loader/loader.php');
    //si el usuario indetificado esta en _SESSION['reset'] 1 => envio a _SESSION['reset']_password.php
    if($_SESSION['user']['reset'] == 1){header('Location: reset_password.php');die;}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resetear clave</title>
        <?php require('parts/head.html'); ?>
        <link rel="stylesheet" href="web/css/login.css">
    </head>
    <body>

        <?php require('parts/message.php'); ?>

        <div class="content">
            <div class="site" data-site="reset"></div>
            <h5> Reset <?php echo $_SESSION['user']['nombre']; ?> </h5>
            <h5>Para resetear tu clave ingresa tu mail.</h5>
            <h5>Por email recibirás un enlace para recuperar la clave.</h5>
            <form action="actions/resetaction.php" method="post">
                <table>
                    <tr>
                        <th>tu email</th>
                        <td><input type="email" name="mail"></td>
                    </tr>
                    <tr>
                        <td><a href="index.php" class="btn btn-sm btn-outline-info">volver</a></td>
                        <td><input class="btn btn-sm btn-outline-success" type="submit" value="enviar"></td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>