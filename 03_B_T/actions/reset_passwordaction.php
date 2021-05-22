<?php 
    require_once('../loader/loader.php');
    $params = $_REQUEST;

    $Control = new Formcontrol();
    $Control->FieldControl('getResetPasswordFields', $params);

    $User = new User('ident');
    $User->getUser($_SESSION['user']['usuario']);
    
    $User->reset = 0;
    $clave_nueva = $User->setUserPass($params['clave']); //clave_nueva true o false
    if(!$clave_nueva){
        $Mensaje->crearMensaje('ya usaste esta clave', 'warning');
        header("Location: $_SERVER[HTTP_REFERER]"); die;
    }
    //echo '<pre>'; var_dump($User); echo '</pre>'; die;
    $User->update();

    $Mensaje->crearMensaje('cambiaste tu clave', 'success');
    header("Location: ../index.php"); die;

?>