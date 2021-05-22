<?php 

    class Mensaje {
        
        public $mensaje;

        public function __construct(){
            if(!isset($_SESSION['mensaje'])){
                $_SESSION['mensaje'] = array('texto'=>'', 'tipo'=>'');
            }
            $this->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
            return;
        }

        public function crearMensaje($texto, $tipo){
            $mensaje = array('texto'=>$texto, 'tipo'=>$tipo);
            $_SESSION['mensaje'] = $mensaje;
            return;
        }

    }
    


?>