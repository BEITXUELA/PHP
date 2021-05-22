<?php 
    require_once('../loader/loader.php');

    $Articulo=new Articulo('ident');
    $Articulo->CrearUnArticulo($_POST);

    header('Location:admin.php');die;

 ?>
