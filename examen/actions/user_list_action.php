<?php 
    session_start();

    $conn = mysqli_connect('localhost','root','','empleo','3306');
    $query = "SELECT * FROM `empleo`.`usuarios`;";
    $resultado = mysqli_query($conn,$query);
    mysqli_close($conn);
    $usuarios = array();
    while ($filas = $resultado -> fetch_assoc()) {
        $usuario = $filas;
        array_push($usuarios,$usuario);
    }
    $_SESSION['usuarios'] = $usuarios;

    header('Location: ../usuarios.php'); die;

  

    

?>