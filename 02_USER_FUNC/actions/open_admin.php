<?php 
    session_start();
    $ident=$_SESSION['identificado']; //var_dump($ident); die;
    //si el usuario intenta entrar sin logar(a capon en el explorador) lo mandamos a index siempre
    if ($ident ==false) {
        header('Location:../index.php');die;
    }
    // $_SESSION['mensaje']['texto'].="Estás en tu Perfil <br>";
    // $_SESSION['mensaje']['tipo']= "success";
    //comprobar el rol del usuario:
    if ($_SESSION['role']!='admin') {
        header('Location: ../backend/perfil.php'); die;
    }

    //si es admin le mandamos a su web de admin
    header('Location: ../admin/admin.php'); die;
?>