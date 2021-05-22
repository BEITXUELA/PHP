<!---->
<?php 
    session_start(); 
    require_once('functions/session.php');
    comenzarSesion();//var_dump($params);
    // $ident=$params['ident'];
    // $usuario=$params['usuario'];

    $mensaje=usarMensajes();
    if ($_SESSION['identificado'] ==false) {
        header('Location:index.php');die;
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar clave</title>
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
        <?php echo 'HOLA '.$_SESSION['nombre'].' Bienvenid@! <br>'; ?>
        <h5>Para resetear tu clave ingresa tu clave nueva</h5>
        <form action="actions/reset_passwordaction.php" method="POST">
            <table>
                <input type="hidden" name="sender" value="frontend">
                <tr>
                    <th>tu nueva clave</th>
                    <td><input type="password" name="clave">
                    </td>
                </tr>
                <tr>
                    <th>confirma tu nueva clave</th>
                    <td><input type="password" name="confirmar_clave">
                    </td>
                </tr>
                <tr>
                    <td><a href="actions/logoutaction.php" class="btn btn-sm btn-outline-warning">Cancelar</a></td>
                    <td><input type="submit" class="btn btn-sm btn-outline-success" value="Cambiar clave"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>