<?php 
    session_start();
    require_once('../functions/session.php'); 
    require_once('../functions/conexion.php'); //se necesita xk se usa en functiones usuario
    require_once('../functions/usuario.php');
    require_once('../functions/helper.php');

    $_SESSION['mensaje']['texto']='';
    $_SESSION['mensaje']['tipo'] ='';
    $errores=false;

    //preguntar x el remitente:
    $sender= $_REQUEST['sender'];

     //si viene x el perfil o x el front
    if ($sender=='backend') {
        $location= 'open_perfil.php';
    }
    if ($sender=='frontend') {
        $location= '../index.php';
    }
     //comprobar si la clave actual es la misma que en la bbdd
     if ($sender=='backend') {
        $correcto=usuario_comparar_clave($_REQUEST['clave_actual'],$_SESSION['usuario']);   
        if ($correcto==false) {
            $_SESSION['mensaje']['texto'].="Clave actual incorrecta <br>";
            $_SESSION['mensaje']['tipo']="danger";
           // header('Location: open_perfil.php');
           $errores=true;
        }  
    }
     //comprobación de campos vacios:
     //comprobamos para frontend y backend - campos comunes
    //$vacios= campos_vacios($_REQUEST);
    if (campos_vacios($_REQUEST)) {
        $_SESSION['mensaje']['texto'] .='algún campo vacío  <br>';
        $_SESSION['mensaje']['tipo'] ='warning';
        $errores=true;
    }
    //comprobar si los claves son iguales:
    if ($_REQUEST['clave']!=$_REQUEST['confirmar_clave']) {
        $_SESSION['mensaje']['texto'].='las claves no son iguales  <br>';
        $_SESSION['mensaje']['tipo'] ='warning';
        $errores=true;
    }

    //funcion para comparar claves repetidas
    // if (usuario_clave_repe()==true) {
    //     $_SESSION['mensaje']['texto'].='NO puedes usar una clave anterior  <br>';
    //     $_SESSION['mensaje']['tipo'] ='warning';
    //     $errores=true;
    //  }

    //si hay error ($errores=true) - reenvio a resetear
    if ($errores==true) {
        if ($sender=='frontend') {
            $location= '../reset_password.php'; die;
        }
        header("Location: $location"); die;
    }

    //funcion para cambiar las claves:
    $set_password=usuario_setPassword($claves_limite=3,$_REQUEST['clave'],$_SESSION['usuario']);
    if ($set_password ==false) {
        $_SESSION['mensaje']['texto'].='Clave ya usada antes, usa otra clave <br>';
        $_SESSION['mensaje']['tipo'] ='warning';   
        if ($sender== 'frontend') {
            $location='../reset_password.php';
        }
    }
    if ($set_password==true) {
        $_SESSION['mensaje']['texto'].='Clave cambiada con éxito <br>';
        $_SESSION['mensaje']['tipo'] ='success';
        $_SESSION['reset']=0; //lo volvemos a poner a 0 para que no vuelva a la misma página
    }
    // //si viene x el perfil
    // if ($sender=='backend') {
    //     header('Location: open_perfil.php'); die;
    // }
    // if ($sender=='frontend') {
    //     header('Location: ../index.php'); die;
    // }
    header("Location: $location"); die;

?>