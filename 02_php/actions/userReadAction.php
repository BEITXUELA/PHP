<?php 
    session_start();
    require_once('conClass.php');
    require_once('usuarioClass.php');

   
    $Con= new Con('localhost','root','','tienda','3306');

    $Usuario_listado= new Usuario();
    $usuario_listado_array=$Usuario_listado->leerUsuarios($Con->con);
    
    $usuario_listado_tabla=$Usuario_listado->usuariosEnTabla($usuario_listado_array);

    $_SESSION['usuario_listado']=$usuario_listado_tabla;
    //var_dump($Usuario_nuevo);
    header('Location: ../crud.php');die;
    //die('en userCreateAction');
    


    die('en userReadAction.php');
?>