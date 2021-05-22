<?php 
    //comenzar sesión
    session_start();
     if ($_SESSION['identificado'] ==false) {
        header('Location:../index.php');die;
    }
    require_once('../functions/session.php');
    comenzarSesion();
    // $ident=$params['ident'];
    // $usuario=$params['usuario'];
    // $reset=$params['reset'];

    $mensaje=usarMensajes();
     //si el usuario identificado esta en reset =>1 le envio a reset_password.php
     if ($_SESSION['reset']== 1) {
        header('Location: ../reset_password.php'); die;
    } //var_dump($reset);
    
    //mensaje de exito de carga de mensaje
    $_SESSION['mensaje']['texto']='Se ha cargado tu archivo';
    $_SESSION['mensaje']['tipo']='success';

    //refrescar cuando cargamos la foto para que se vea en el acto:
    if (!isset($_SESSION['reload']) ) {
        $_SESSION['reload']='no';
    }
    //RECARRGAMOS SOLO CON TRUE/YES
    if ($_SESSION['reload']=='yes') {
        //resetear variable
        $_SESSION['reload']='no';
        //recargar
        header('Refresh:0'); die; //recarga la web
    }
    
    
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <?php require('parts/head.html'); ?>
</head>

<body>

    <?php require('parts/backendMenu.php');?>
    <?php require('../parts/message.php');?>

    <div class="content">
        <?php echo '<h5 class="saludo">HOLA '.$_SESSION['nombre'].' Bienvenid@! a tu perfil <h5><br>'; ?>
        <div class="site" data-site="perfil"></div>

        <div class="bloque">
            <h5>Cambiar Clave:</h5><br>
            <form action="../actions/reset_passwordaction.php" method="POST">
                <table>
                    <input type="hidden" name="sender" value="backend">
                    <tr>
                        <th>Tu Clave Actual</th>
                        <td><input type="password" name="clave_actual">
                        </td>
                    </tr>
                    <tr>
                        <th>Tu NUEVA Clave</th>
                        <td><input type="password" name="clave">
                        </td>
                    </tr>
                    <tr>
                        <th>Confirma tu NUEVA Clave</th>
                        <td><input type="password" name="confirmar_clave"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input type="submit" class="btn btn-sm btn-outline-success" value="Cambiar clave"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="bloque">
            <h5>Cargar Imágen de Perfil:</h5><br>
            <form action="../actions/file_upload.php" method="POST" enctype="multipart/form-data">
                <label for="">Cargar tu imágen</label>
                <input type="file" name="foto" id="" required> <br><br>
                <input class="btn btn-sm btn-outline-success" type="submit" value="Cargar"> <br>
            </form>
            <?php 
            if (($_SESSION['profileroute'] == NULL) OR ($_SESSION['profileroute']=='' )) {
                $src='../web/uploads/perfil.png';
            }else {
                $src=$_SESSION['profileroute'];
            }
         ?>

            <img src="<?php echo $src; ?>" alt="foto perfil" width="100px">
            <!--img src="../web/uploads/users/1/1_perfil.jpg" alt="foto perfil" width="100px"-->
            <!-- <script>
                window.onload=function(){
                    Location.load();
                }

            </script> -->
        </div>

        <div class="bloque">
            <h5>Datos Personales:</h5><br>
            <form action="" method="POST">
                <table>
                    <tr>
                        <th>Nombre:</th>
                        <td><input type="text" name="nombre" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Apellidos:</th>
                        <td><input type="text" name="apellidos" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento:</th>
                        <td><input type="date" name="fecha" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Sexo:</th>
                        <td>
                            Mujer <input required type="radio" name="sexo" value="mujer">
                            Hombre <input required type="radio" name="sexo" value="hombre">
                            Otros <input required type="radio" name="sexo" value="hombre">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input type="submit" class="btn btn-sm btn-outline-success" value="Enviar"></td>
                    </tr>
                </table>

            </form>
        </div>

        <div class="bloque">
            <h5>Datos Dirección de Entrega:</h5><br>
            <form action="" method="POST">
                <table>
                    <input type="hidden" name="sender" value="backend">

                    <tr>
                        <th>Dirección: </th>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Calle Nr. Piso</th>
                        <td>
                            <input placeholder="Calle" required type="text" name="calle">
                            <input class="peque" placeholder="Número" required type="text" name="numero">
                            <input class="peque" placeholder="Piso" required type="text" name="piso">
                        </td>
                    </tr>

                    <tr>
                        <th>Más dirección</th>
                        <td><input type="text" name="extra"></td>
                    </tr>

                    <tr>
                        <th>Código postal y Localidad</th>
                        <td>
                            <input class="mediano" placeholder="00000" required type="text" name="postal">
                            <input required type="text" name="localidad">
                        </td>
                    </tr>
                    <tr>
                        <th>Provincia</th>
                        <td>
                            <input required type="text" name="provincia">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input class="btn btn-sm btn-outline-success" type="submit" value="guardar"></td>
                    </tr>
                </table>

            </form>
        </div>

        <div class="bloque">
            <h5>Datos Dirección de Facturación:</h5><br>
            <form action="" method="POST">
                <table>
                    <input type="hidden" name="sender" value="backend">

                    <tr>
                        <th>Dirección: </th>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Calle Nr. Piso</th>
                        <td>
                            <input placeholder="Calle" required type="text" name="calle">
                            <input class="peque" placeholder="Número" required type="text" name="numero">
                            <input class="peque" placeholder="Piso" required type="text" name="piso">
                        </td>
                    </tr>

                    <tr>
                        <th>Más dirección</th>
                        <td><input type="text" name="extra"></td>
                    </tr>

                    <tr>
                        <th>Código postal y Localidad</th>
                        <td>
                            <input class="mediano" placeholder="00000" required type="text" name="postal">
                            <input required type="text" name="localidad">
                        </td>
                    </tr>
                    <tr>
                        <th>Provincia</th>
                        <td>
                            <input required type="text" name="provincia">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input class="btn btn-sm btn-outline-success" type="submit" value="guardar"></td>
                    </tr>
                </table>

            </form>
        </div>

    </div>

    <ul>
        <li>datos de pago</li>
    </ul>
    </div>
</body>

</html>