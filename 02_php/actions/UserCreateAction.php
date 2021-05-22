<?php   
    session_start();
    require_once('conClass.php');
    require_once('usuarioClass.php');

    $params=$_REQUEST;
    $Con= new Con('localhost','root','','tienda','3306');

    $Usuario_nuevo= new Usuario();
    $Usuario_nuevo->crearUsuario($params,$Con->con);
    
    //var_dump($Usuario_nuevo);
    header('Location: userReadAction.php');
    
    //die('en userCreateAction');
 ?>
