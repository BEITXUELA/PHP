<?php 
    session_start();
    //una manera de volver a 0 todo:
    //$_SESSION['identificado']=false;
    //$_SESSION['usuario']='';
    //$_SESSION['mensaje']='';
    //una manera de volver a null todo:
    // unset($_SESSION['identificado']);
    //unset ($_SESSION['usuario']);
    //unset ($_SESSION['mensaje']);
    //Y la manera más rápida con session_destroy();:
    session_destroy();
    header("Location:../index.php"); die;
?>