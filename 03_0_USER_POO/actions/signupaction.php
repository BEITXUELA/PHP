<?php 

    require_once('../loader/loader.php');
    $params=$_REQUEST;
    // echo '<pre>';
    // var_dump($params);
    // echo '</pre>';die;
    //comprobar form paramentros:
    $Control= new FormControl();
    $fields=array(
        '0/'.$params['nombre']=>array('empty'),
        '1/'.$params['mail']=>['empty','mail'],
        '2/'.$params['confirmar_mail'].'?'.$params['mail']=>['match'],
        '3/'.$params['clave']=>['empty','minmax'],
        '4/'.$params['confirmar_clave'].'?'.$params['clave']=>['match']
    );
    // echo '<pre>';
    // var_dump($fields);
    // echo '</pre>';die;
    $Control->fieldControl($fields); //print_r($mensaje);    
     //comprobar que no existe el usuario, si existe le devolveriamos.
    //si no existe-> crear usuario:
    $Con=new Con('localhost','root','','ident','3306');
    $User= new User();
    //$Mensaje=new Mensaje(); lo arrancamos ya en el loader.php
    //$mensaje=$Mensaje->usarMensajes();
    $existe=$User->buscarUsuario($params['mail'],$Con->con);
    if ($existe) {
       $Mensaje->crearMensaje('Este usuario ya está registrado.','danger');
       header("Location:$_SERVER[HTTP_REFERER]"); die;
    }
    $User->saveUser($params,$Con->con);
    $Mensaje->crearMensaje('Usuario creado con exito.','success');
    header("Location:../index.php"); die;
    //die('exito total');

?>