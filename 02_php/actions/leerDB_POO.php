<?php 
    //class productos
    //class articulos
    session_start(); //arrancar session
    require_once('conClass.php');
    require_once('productosClass.php');
    require_once('ArticulosClass.php');

    //conexiones:
    $Con =new Con('localhost','root','','tienda','3306');
    $Con2 =new Con('localhost','root','','blog','3306');


    //nuevo objeto Producto:
    $Producto= new Producto();
    $productos_array=$Producto->getProductos($Con->con);

     //nuevo objeto Articulo:
     $Articulo= new Articulo();
     $articulos_array=$Articulo->getArticulos($Con2->con);
 
    //var_dumps para mostrar los productos y los articulos: 
    //var_dump($productos_array); echo '<br>';
    //var_dump($articulos_array); echo '<br>';

    //array para juntar todo:
    $data=array(
                'productos'=>$productos_array,
                'articulos'=>$articulos_array
    );
    
    //llamamos al metodo desconectar la conexion:
    $Con->descon();
    $Con2->descon();

    
    $_SESSION['data']=$data;

    //se pueden mandar los objetos
    //    $data2=array(
    //         $Producto,
    //         $Articulo
    //     );
    //     $_SESSION['data2']=$data2;
    //mandar a ejercicio3_destino.php
    header('Location: ../ejercicio3_destino.php'); die;




 ?>