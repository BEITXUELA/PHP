<?php 
    session_start();
    require_once('conClass.php');
    require_once('usuarioClass.php');

   
    $Con= new Con('localhost','root','','tienda','3306');

    $Usuario_borrado= new Usuario();
    $usuario= $_GET['usuario'];
    // echo '<pre>';
    // var_dump($usuario);
    // echo '</pre>'; die;
    $Usuario_borrado->borrarUsuario($usuario,$Con->con);
    
   
    header('Location: userReadAction.php');die;
    //die('en userCreateAction');

    //die('en user_deleteAction.php');
?>