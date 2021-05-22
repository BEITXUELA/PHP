<?php 
    session_start();
    $usuarios = $_SESSION['usuarios'];
    unset($_SESSION['usuarios']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Examen PHP y BBDD Visualización</title>
    <?php require('parts/head.html') ?>
    <style>
        .usuarios td, .usuarios th{
            padding: 10px;
            padding-right: 20px;
        }
    </style>
</head>
<body>  
    <?php include_once('parts/menu.html') ?>     

    <div class="block" style="padding-left: 20px">
    <h4>Listado de Usuarios</h4>
        <?php 
        echo "<table class='usuarios'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>MAIL</th>";
                echo "<th>NOMBRE</th>";
                echo "<th>CLAVE</th>";                
            echo "</tr>";
        foreach ($usuarios as $key => $usuario) {
            echo '<tr>';
            foreach ($usuario as $key => $campo) {
                echo '<td>'.$campo.'</td>';
            }
            echo '</tr>';
        }
        echo "</table>";
    ?>            
    </div>    

    <div class="text-center centrado">
        <a class="btn btn-outline-dark center" href="index.php">Volver</a>          
    </div>
 
    <footer></footer>

</body>
</html>