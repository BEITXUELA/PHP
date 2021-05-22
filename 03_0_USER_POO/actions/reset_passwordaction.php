<?php 
    require_once('../loader/loader.php');
    $params=$_REQUEST;

    $Control=new FormControl();
    $Control->fieldControl($params);

    $User= new User();
    $User->reset=0;
    $User->getUser($_SESSION['user']['usuario'],$Con->con);
    $clave_nueva=$User->setUserPass($params['clave']);
    if (!$clave_nueva) {
        $Mensaje->crearMensaje('Ya habías usado esta clave ','success');
        header("Location:$_SERVER[HTTP_REFERER]"); die;
    }
    $User->update($Con->con);

    $Mensaje->crearMensaje('Cambiaste tu clave con exito','success');
    header("Location: ../index.php"); die;



 ?>
