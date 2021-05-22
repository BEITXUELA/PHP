<?php 
   
    //leer productos:
    //conectar a la BBDD:
    $con=mysqli_connect('localhost','root','','tienda','3306');
    //var_dump($con); die;
    //consultar datos:
    $query="SELECT * FROM `productos`"; //var_dump($query);
    $resultado=mysqli_query($con,$query);
    //var_dump($resultado);
    $productos=array();
    while ($fila = $resultado->fetch_assoc()) {
        $producto['nombre']=$fila['nombre'];
        $producto['euros']=$fila['precio_euros'];
        $producto['centimos']=$fila['precio_centimos'];
        $producto['stock']=$fila['stock'];
        $producto['des']=$fila['des'];

       array_push($productos,$producto);

        //array_shift($producto); //quitar primer elemento del array
        //array_pop($producto); //quitar ultimo elemento del array
        //array_push($productos, $producto); //añade elemento al final

    }
    //var_dump($productos);die;
    session_start();
    $_SESSION['productos']=$productos;



    mysqli_close($con);

    //die;
    //ir a ejercio_destino.php:
    header('Location: ../ejercicio_destino.php ');  die;

  





 ?>