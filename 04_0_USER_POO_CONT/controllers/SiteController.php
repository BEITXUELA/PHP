<?php 
    
    class SiteController{

        public function indexAction(){
            header('Location: ../index.php'); die;


        }

        public function signupAction(){
            header('Location: signup.php'); die;

        }

        public function resetAction(){
            header('Location: reset.php'); die;
        }



    }

?>
