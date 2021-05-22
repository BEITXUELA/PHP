<?php 
    session_start();
    require_once('conClass.php');
    require_once('usuarioClass.php');
    $paramsOriginal= $_SESSION['usuario_update'];

   
    $Con= new Con('localhost','root','','tienda','3306');

    $Usuario_update= new Usuario();
    $params=$_REQUEST;
    //$params_new= $_POST;
    //$params=$_SESSION['usuario_update'];
    // echo '<pre>';
    // var_dump($usuario);
    // echo '</pre>'; die;
    $usuarioUpdate=$Usuario_update->updateUsuario($paramsOriginal,$params,$Con->con);
    
   
    header('Location: userReadAction.php');die;
    //die('en userCreateAction');

    //die('en user_deleteAction.php');
?>