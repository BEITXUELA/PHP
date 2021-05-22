<?php 
    //leer artículos:
    //conectar a la BBDD:
    $con=mysqli_connect('localhost','root','','blog','3306');
    //var_dump($con); die;
    //consultar datos:
    $query="SELECT * FROM `articulos`"; //var_dump($query);
    $resultado=mysqli_query($con,$query);
    //var_dump($resultado);
    $articulos=array();
    while ($fila = $resultado->fetch_assoc()) {
        $articulo = $fila;
        // $articulo['id']=$fila['id'];
        // $articulo['nombre']=$fila['nombre'];
        // $articulo['contenido']=$fila['contenido'];

        // datos = array()
        // While(fila = resultado->fetch_assoc()){
        //     fila[] = fila;
        //     array_push(datos, dato);
        // };    
       array_push($articulos,$articulo);

        //array_shift($producto); //quitar primer elemento del array
        //array_pop($producto); //quitar ultimo elemento del array
        //array_push($productos, $producto); //añade elemento al final

    }
    //var_dump($productos);die;
    session_start();
    $_SESSION['articulos']=$articulos;

    mysqli_close($con);

    //die;
    //ir a ejercio_destino.php:
    header('Location: ../ejercicio2_destino.php ');  die;

 ?>