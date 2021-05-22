<?php 
    require_once('../loader/loader.php');

    $Articulo=new Articulo('ident');
    $Articulo->borrarUnArticulo($_GET['id']);

    header('Location:admin.php');die;



 ?>
