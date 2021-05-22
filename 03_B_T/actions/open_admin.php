<?php 
    require_once('../loader/loader.php');
    if (!$Session->is_Admin()) { //devuelve boolen
        header('Location:logoutaction.php');die;
    }
    // if(!$_SESSION['user']['identificado']){
    //     header('Location:logoutaction.php');die;
    // }
    // if($_SESSION['user']['role'] !='admin'){
    //     header('Location:logoutaction.php');die;
    // }
    header('Location:../backend/admin.php');die;
?>