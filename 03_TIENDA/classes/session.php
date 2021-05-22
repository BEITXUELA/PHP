<?php 

    class Session{
        
        public $user_session;

        public function __construct(){
            if (!isset($_SESSION['user']['identificado'])) {
                $_SESSION['user']['identificado'] = false;
                $_SESSION['user']['nombre'] = '';
                $_SESSION['user']['usuario'] = '';
                $_SESSION['user']['reset'] = 0;
                $_SESSION['user']['role'] = 'usuario';
                $_SESSION['user']['profileroute'] = '';
                $this->user_session = $_SESSION['user'];
            }
            return;
        }

        public function setUserSession($user){ //echo '<pre>'; var_dump($user); echo '</pre>'; die;
            
            $_SESSION['user']['identificado'] = true;
            $_SESSION['user']['nombre'] = $user['nombre'];
            $_SESSION['user']['usuario'] = $user['usuario'];
            $_SESSION['user']['reset'] = $user['reset'];
            $_SESSION['user']['role'] = $user['role'];
            $_SESSION['user']['profileroute'] = $user['profileroute'];
            $this->user_session = $_SESSION['user'];

            return;
        }



    }
    



?>