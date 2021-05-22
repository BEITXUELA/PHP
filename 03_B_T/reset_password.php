<?php
    require_once('loader/loader.php'); 
    //echo '<pre>'; var_dump($_SESSION['user']['identificado']); echo '</pre>'; die('reset_password');

    if($_SESSION['user']['identificado'] === false){header('Location: index.php'); die;}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cambiar clave</title>
        <?php require('parts/head.html'); ?>
        <link rel="stylesheet" href="web/css/login.css">
    </head>
    <body>

        <?php require('parts/message.php'); ?>

        <div class="content">
            <div class="site" data-site="reset"></div>
            <h5> Reset <?php echo $_SESSION['user']['nombre']; ?> </h5>
            <h5>Para resetear tu clave ingresa tu clave nueva.</h5>
            <form action="actions/reset_passwordaction.php" method="post">
                <table>
                    <input type="hidden" name="sender" value="frontend">
                    <tr>
                        <th>tu nueva clave</th>
                        <td><input type="password" name="clave"></td>
                    </tr>
                    <tr>
                        <th>repite tu nueva clave</th>
                        <td><input type="password" name="confirmar_clave"></td>
                    </tr>
                    <tr>
                        <td><a href="actions/logoutaction.php" class="btn btn-sm btn-outline-warning">cancelar</a></td>
                        <td><input class="btn btn-sm btn-outline-success" type="submit" value="cambiar clave"></td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>