<?php 
    require_once('../loader/loader.php');
    $params=$_REQUEST; //var_dump($params); die;
    if ($params['mail']=='') {
        $Mensaje->crearMensaje('Campo vacío. <br>','warning');
       header("Location:$_SERVER[HTTP_REFERER]");die;
    }
    // if (!filter_var($params['mail'], FILTER_VALIDATE_EMAIL)) {
    //     $this->mensaje['texto'] .= 'Email no valido! <br>';
    //     $this->mensaje['tipo'] = 'warning';
    // }

    $Con= new Con('localhost','root','','ident','3306');
    $User=new User();
    //$Control=new FormControl();
    $existe= $User->buscarUsuario($params['mail'],$Con->con);
    if (!$existe) {
        $Mensaje->crearMensaje('Este usuario no existe.','danger');
        header("Location:$_SERVER[HTTP_REFERER]");die;
    }

    $User->getUser($params['mail'],$Con->con);
    $User->reset=1;
    $clave=$User->RandomString();
    //encriptacion en private function
    $User->update($Con->con);
    $Mensaje->crearMensaje('Recibirás un email con tu nueva clave '.$clave,'success');
    //die('ha pasado');

 ?>
