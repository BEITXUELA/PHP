<?php 

    class Mensaje{
        public $mensaje;
        
        public function usarMensajes(){
            if (!isset($_SESSION['mensaje'])) {
               //$this->mensaje=$mensaje;
                $_SESSION['mensaje']=array('texto'=>'','tipo'=>'');
            }
            $this->mensaje=$_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
            return $this->mensaje;
        }

        public function crearMensaje($texto,$tipo){
            $mensaje=array('texto'=>$texto,'tipo'=>$tipo);
            $_SESSION['mensaje']=$mensaje;
            return;
        }
    }

?>