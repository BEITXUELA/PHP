<?php 
    require_once('../loader/loader.php');
    $params = $_REQUEST;
    //echo '<pre>'; var_dump($params); echo '</pre>'; die;

    //comprobar form parametros
    $Control = new Formcontrol();
    $Control->FieldControl('getSignUpFields', $params);


    //crear usuario
    //comprobar que no exista el usuario
    $User = new User('ident');
    $existe = $User->buscar_usuario($params['mail']);
    if($existe){
        $Mensaje->crearMensaje('Ya estas registrado','warning');
        header("Location:  $_SERVER[HTTP_REFERER]"); die;
    }

    //crear
    $User->crearUsuario($params);

    $Mensaje->crearMensaje('usuario creado con exito', 'success');
    header("Location: ../index.php"); die;

?>