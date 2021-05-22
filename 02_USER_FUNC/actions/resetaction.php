<?php
    session_start();
    require_once('../functions/conexion.php'); //se necesita xk se usa en functiones usuario
    require_once('../functions/usuario.php');
    require_once('../functions/helper.php');
    // require_once('../functions/session.php'); 
    //si tb lo tenemos en require_once no pasa nada, pero si solo esta como require puede petar

//comprobar campos vacios: 
$mensaje['texto'] = '';
$mensaje['tipo'] = '';
$errores = false;
$vacios = campos_vacios($_REQUEST);
if ($vacios) {
    $mensaje['texto'] .= 'algún campo vacío  <br>';
    $mensaje['tipo'] = 'warning';
    $errores = true;
}
//comprobar si es un email:
if (filter_var($_REQUEST['mail'], FILTER_VALIDATE_EMAIL) == false) {
    $mensaje['texto'] .= 'email erróneo  <br>';
    $mensaje['tipo'] = 'warning';
    $errores = true;
}

//si hay algún error ($errores=true) - reenvio a openreset
if ($errores == true) {
    $_SESSION['mensaje'] = $mensaje;
    header('Location: open_reset.php');die;
}

//comprobar si existe el usuario?:
//1er if si el usuario SI existe
if (usuario_existe($_REQUEST['mail'])) { //funcion de usuario.php
    $clave = usuario_reset($_REQUEST['mail']);
    $info='Revisa tu correo, te llegará un email con tu nueva clave <br>';
    entorno()=='desarrollo'?$info.=$clave:$info=$info;
    $_SESSION['mensaje']['texto'] = $info;
    //solo nos muestra la clave si estamos desarrollando
    // if (entorno() == 'desarrollo') {
    //     $mensaje['texto'] .= 'Revisa tu correo, te llegará un email con tu nueva clave <br>' . $clave;
    // } else {
    //     $mensaje['texto'] .= 'Revisa tu correo, te llegará un email con tu nueva clave <br>';
    // }
    //$clave solo la mostramos en desarrollo porque luego no queremos mostrarsela en el mensaje
    $_SESSION['mensaje']['tipo'] = 'success';
    header('Location: ../index.php');die;
    //else si el usuario NO existe
} else {
    $mensaje['texto'] .= 'este Usuario no está registrado <br>';
    $mensaje['tipo'] = 'danger';
    $_SESSION['mensaje'] = $mensaje;
    header('Location: open_reset.php'); die;
}
    
    //$resultado=consultar($query); --la $query esta en la función usuario_existe
?>