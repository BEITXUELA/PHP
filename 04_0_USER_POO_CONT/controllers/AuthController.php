<?php 
    
    class AuthController{

        public function loginAction(){
             die('AuthController->loginAction');
             require_once('../loader/loader.php');//echo '<pre>'; var_dump($classes); echo count($classes); echo '</pre>';die;
    $params = $_REQUEST;  //var_dump($params); echo "<br>"; //die;
    
    $Control = new Formcontrol();
    $User = new User('ident'); //ident es la base para la clase CON padre de User
    $Mensaje=new Mensaje();
    $Session=new Session();        
    //control campos
    $Control->FieldControl('getLoginFields', $params);
    $existe_el_usuario = $User->buscar_usuario($params['usuario']); //var_dump($existe_el_usuario);

   
    //no encontrado -> de vuelta con mensaje y sin identificar
    if (!$existe_el_usuario) {
        $Mensaje->crearMensaje('usuario no existe <br>', 'danger');
        header('Location: ../routes/router.php?action=indexAction'); die;
    }

    //comprobar la clave
    $clave_correcta = $User->comprobar_clave($params['clave']);
    if (!$clave_correcta) {
        $Mensaje->crearMensaje('clave incorrecta <br>', 'danger');
        header('Location:  ../routes/router.php?action=indexAction'); die;
    }

    //pasamos a index indentificado
    $user = $User->getUser($params['usuario']);

    //$User->updateUserField('lastlogin', date('Y-m-d H:i:s'));
    $User->lastlogin = date('Y-m-d H:i:s'); //guardar en Objeto User
    $User->update(); //pasar objeto User por completo a Base de datos

    //echo '<pre>'; var_dump($User); echo '</pre>'; die;
    
    $Session->setUserSession($user);

    if ($User->reset == 1) {
        $mensaje = 'Debes cambiar tu clave!<br>';
        $Mensaje->crearMensaje($mensaje, 'warning');
        header("Location: ../reset_password.php"); die;
    }

    $mensaje = 'Bienvenido! Logeado con exito!<br>';
    $mensaje .= 'Ultima conexión: '.$User->lastlogin; //$uer['lastlogin']
    $Mensaje->crearMensaje($mensaje, 'success');
    header('Location:  ../routes/router.php?action=indexAction'); die;


    }

}
?>
