<?php 
    session_start();
    require_once('../functions/conexion.php'); //se necesita xk se usa en functiones usuario
    require_once('../functions/usuario.php');
    require_once('../functions/helper.php');
    
    $params=$_REQUEST; //var_dump($params); echo "<br>";

    $mensaje['texto']='';
    $mensaje['tipo']='';
    $errores=false;

    //var_dump($mensaje); die;
    //$rellenado=true;
    //Comprobaciones:
    //comprobación de campos vacios:
    $vacios= campos_vacios($_REQUEST);
    if ($vacios) {
        $mensaje['texto'] .='algún campo vacío  <br>';
        $mensaje['tipo'] ='warning';
        $errores=true;
    }
    // foreach ($params as $key => $value) {
    //     if ($value== '') {
    //         $mensaje .='algún campo vacío  <br>';
    //         $rellenado=false;   
    //         break;
    //     }
        // if ($rellenado==false) {
        //     break;
        // }
    //}//var_dump($rellenado); die;

    //comprobar si es un email:
    if (filter_var($params['mail'],FILTER_VALIDATE_EMAIL)==false) {
        $mensaje['texto'].='email erróneo  <br>';
        $mensaje['tipo'] ='warning';
        $errores=true;
    }
    //comprobar si los emails son iguales:
    if ($params['mail']!=$params['confirmar_mail']) {
        $mensaje['texto'].='los emails no son iguales  <br>';
        $mensaje['tipo'] ='warning';
        $errores=true;
    }
    //comprobar si los claves son iguales:
    if ($params['clave']!=$params['confirmar_clave']) {
        $mensaje['texto'].='las claves no son iguales  <br>';
        $mensaje['tipo'] ='warning';
        $errores=true;
    }

   // var_dump($errores); echo $mensaje['texto']; die;
    //si hay error ($errores=true) - reenvio a signup
    if ($errores==true) {
        $_SESSION['mensaje']=$mensaje;
        header('Location: open_signup.php'); die;
    }

    //comprobar si existe el usuario?:
    if (usuario_existe($params['mail'])) { //funcion de usuario.php
        $mensaje['texto'].='este Usuario ya existe <br>';
        $mensaje['tipo'] ='danger';
        $_SESSION['mensaje']=$mensaje;
        header('Location: open_signup.php'); die;

    }
    //Acciones:
    //crear usuario nuevo:
    $control=usuario_crear($params);
    if ($control==false) {
        $_SESSION['mensaje']['texto'].='Usuario NO creado, por favor ponte en contacto con nosotros <br>';
        $_SESSION['mensaje']['tipo'] ='danger';
        header('Location: open_signup.php'); die;
    }
    //volver a login/index con mensaje usuario creado:
    //esta fila 73 es lo mismo ke las filas de 62 a 64
    $_SESSION['mensaje']['tipo']='success';
    $_SESSION['mensaje']['texto']=' Usuario creado con éxito, ya puede hacer login';
    header('Location: ../index.php'); die;

    
    //die('end signup');
?>