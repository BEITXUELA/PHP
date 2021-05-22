<?php 
    require_once('../loader/loader.php');
    $params = $_REQUEST; echo '<pre>';

    $Control = new Formcontrol();
    $Control->FieldControl('getResetFields', $params);

    $User = new User('ident');
    $existe = $User->buscar_usuario($params['mail']);
    if(!$existe){
        $Mensaje->crearMensaje('ususario no existe', 'warning');
        header("Location: $_SERVER[HTTP_REFERER]"); die;
    }


    $User->getUser($params['mail']);
    $User->reset = 1;
    $clave = $User->RandomString(); //encriptacion en private function
    echo '<pre>'; var_dump($User); echo '</pre>'; //die;
    $User->update();

    $Mensaje->crearMensaje('recibiras un mail '.$clave, 'success');
    header("Location: $_SERVER[HTTP_REFERER]"); die;

?>