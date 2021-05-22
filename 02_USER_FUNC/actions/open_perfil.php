<?php 
    session_start();
    $ident=$_SESSION['identificado']; //var_dump($ident); die;
    //si el usuario intenta entrar sin logar(a capon en el explorador) lo mandamos a index siempre
    if ($ident ==false) {
        header('Location:../index.php');die;
    }
    // $_SESSION['mensaje']['texto'].="Estás en tu Perfil <br>";
    // $_SESSION['mensaje']['tipo']= "success";

    header('Location: ../backend/perfil.php'); die;
?>