<?php 
session_start();
if (!isset($_SESSION['sesion_inicio'])) {
    $_SESSION['sesion_inicio']='NO'; 
}
$sesion=$_SESSION['sesion_inicio']; 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Examen PHP y BBDD</title>
    <?php require('parts/head.html') ?>
</head>

<body>
    <?php include_once('parts/menu.html') ?>


    <div class="block">
        <h2>Lectura de base de datos Empleo con Tabla de Usuarios</h2>
        <h4>En phpMyAdmin:</h4>
        <ul>
            <li>Creamos la base de datos Empleo</li>
            <li>Creamos la tabla usuarios</li>
            <li>Insertamos varios usuarios en la tabla</li>
            <li>Exportamos la base de datos empleo.sql</li>
            <li>Adjuntamos la base de datos empleo.sql al proyecto</li>
            <li>Recogemos datos y listamos</li>
        </ul>
        <form action="actions/user_list_action.php" method="POST">
            <input class="btn btn-sm btn-outline-success" type="submit" value="leer usuarios">
        </form>
    </div>

</body>

</html>