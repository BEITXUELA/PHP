<?php 
    class Session
    {
        public $user_session;
        
        public function __construct(){
        //public function comenzarSession(){ //var_dump($_SESSION['user']['identificado']);//die;
            if (!isset($_SESSION['user']['identificado'])) {
                //var_dump($_SESSION['user']['identificado']); //die;
                $_SESSION['user']['identificado']=false;
                //var_dump($_SESSION['user']['identificado']); die;
                $_SESSION['user']['nombre']="";
                $_SESSION['user']['usuario']="";
                $_SESSION['user']['reset']=0;
                $_SESSION['user']['role']="usuario";
                $_SESSION['user']['profileroute']="";
                $this->user_session=$_SESSION['user'];

            }
            return;
        }


        public function setUserSession($user){
            $_SESSION['user']['identificado']=true;
            $_SESSION['user']['nombre']=$user['nombre'];
            $_SESSION['user']['usuario']=$user['usuario'];
            $_SESSION['user']['reset']=$user['reset'];
            $_SESSION['user']['role']=$user['role'];
            $_SESSION['user']['profileroute']=$user['profileroute'];
            $this->user_session=$_SESSION['user'];

            return;
        }


    }
    










 ?>
