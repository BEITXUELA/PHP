<?php 
   function comenzarSesion(){
        if (!isset($_SESSION['identificado'])) {
            $_SESSION['identificado'] = false; //var_dump($_SESSION['identificado']);
            $_SESSION['nombre']='';
            $_SESSION['usuario'] = '';
            $_SESSION['reset']=0;
            $_SESSION['role']='usuario';
            $_SESSION['profileroute']='';
        }
        $params = ['ident'=>$_SESSION['identificado'], 'nombre'=>$_SESSION['nombre'],'usuario'=>$_SESSION['usuario'],'reset'=>$_SESSION['reset']];
        return $params;
    }
    function usarMensajes(){
        if (!isset($_SESSION['mensaje'])) { //isset definido?
            $mensaje=array ('texto'=>'','tipo'=>''); //var_dump($mensaje); die;
            $_SESSION['mensaje'] = $mensaje;
        } 
        $mensaje = $_SESSION['mensaje']; //quita el mensaje en caso de recarga CON f5
        unset($_SESSION['mensaje']); //unset --> quita la definicion
        return $mensaje;
    }
?>