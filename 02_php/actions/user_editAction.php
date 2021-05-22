<?php 
    session_start();
    unset($_SESSION['usuario_update']);
    require_once('conClass.php');
    require_once('usuarioClass.php');

   
    $Con= new Con('localhost','root','','tienda','3306');

    $Usuario_update= new Usuario();
    $usuario=$_REQUEST['usuario'];
    
    $usuario_update=$Usuario_update->leerUsuario($usuario,$Con->con);
   
    $_SESSION['usuario_update']=$usuario_update;
    
    header('Location: ../crud_edit.php');die;
    
    


    //die('en user_updateAction.php');
?>