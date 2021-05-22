<?php 
    require_once('../loader/loader.php');
     //al poner el require_once de loader ya no hacen falta los demaas require_once
    //session_start(); //arrancar session
    $params= $_REQUEST; //POST de loginform.php
    //var_dump($params); echo "<br>";
    
    $Control= new FormControl();
    $Con= new Con('localhost','root','','ident','3306');
    $User= new User();

    //echo '<pre>';var_dump($classes); var_dump(count($classes));echo '</pre>'; die;
    //require_once('../classes/formcontrol.php');
    
    //control campos
   
    $fields=array(
        $params['usuario']=>array('empty','email'),
        $params['clave']=>['empty'] //2 maneras de hacer arrays, este pro y el anterior
    );
    //echo '<pre>';print_r($fields);echo '</pre>'; 
    $Control->fieldControl($fields); //print_r($mensaje);
    // $_SESSION['mensaje']=$mensaje;
    // if ($mensaje['tipo']!='') {
    //     header('Location: ../index.php');die;
    // }
    //die('control ok');
    

    //conexion
    //require_once('../classes/conClass.php');
    //var_dump($Con->con);

    //buscar usuario:
    //require_once('../classes/user.php');
    
    $existe_usuario=$User->buscarUsuario($params['usuario'],$Con->con);
    
    //no encontrado-> devuelta con mensaje y sin identificar:
    //require_once('../classes/mensajes.php');  
    //$Mensaje= new Mensaje();  
    if (!$existe_usuario) {
        $Mensaje->crearMensaje('el Usuario no existe <br>','danger');
        header('Location:../index.php'); die;
    }

    //si es encontrado 
    //comprobar la clave:
    $claveCorrecta=$User->comprobarClave($params['clave']);
    if (!$claveCorrecta) {
        $Mensaje->crearMensaje('la Clave NO es correcta <br>','danger');
        header('Location:../index.php'); die;
    }

    //pasamos a index identificado
    $user=$User->getUser($params['usuario'],$Con->con);

    //require_once('../classes/session.php');
    //$Session= new Session();
    $Session->setUserSession($user);
    //$Session->setUserSession($User);

    //$User->setNewLastLogin($Con->con);
   
    //$User->updateUserField($Con->con,'lastlogin',date('Y-m-d H:i:s'));
    $User->lastlogin=date('Y-m-d H:i:s'); //guardar en Objecto User
    $User->update($Con->con); //pasar objeto User x completo a bbdd
    if ($User->reset==1) {
        $mensaje='Debes cambiar tu clave <br>';
        $Mensaje->crearMensaje($mensaje,'warning'); 
        header('Location: ../reset_password.php'); die;
    }
    
    // echo '<pre>'; var_dump($User); echo '</pre>';

    // $User->lastlogin = date('Y-m-d H:i:s');
    // $User->nombre = 'Pedro';
    // $User->reset = 1;
    // $User->role = 'usuario';

    

    //die ('exito');
    $mensaje='Bienvenido, Logeado con éxito <br>';
    $mensaje.='Última conexión: '.$User->lastlogin;
    $Mensaje->crearMensaje($mensaje,'success');
    // echo '<pre>'; var_dump($User); echo '</pre>';

    //die;
   
    header('Location:../index.php'); die;
?>
