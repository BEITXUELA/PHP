<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php BBDD</title>
    <?php require('parts/head.html'); ?>
</head>

<body>
    <div data-site=".base" class="site"></div>

    <?php require_once('parts/header.html'); ?>
    <?php include_once('parts/menu.html'); ?>

    <div class="block">
        <h2>Base de datos - php - leer - conectar</h2>
        <h3>conectar</h3>
        <p>
            Hemos creado una base de datos - phpbase - y una tabla productos <br>
            La tabla productos tiene 6 campos -id/nombre/categoria/descripcion/precio/stock <br>
        </p>
        <p>
            Primer paso - conexion - con mysqli_connect
        </p>
        <?php 
            $conn= mysqli_connect('localhost','root','','phpbase','3306');
           // var_dump($conn);
           echo $conn?'<p>conectado</p>':'<p>sin conexion</p>';

        ?>
    </div>

    <div class="block">
        <h2>Base de datos - php - leer- petición</h2>
        <h3>enviar peticion query</h3>
        <p>
            Segundo paso - query a la base de datos <br>
            $query= "SELECT * FROM `productos`"; <br>
            $result= mysqli_query($conn,$query); <br>
        </p>
        <?php 
            $query= "SELECT * FROM `productos`";
            $result= mysqli_query($conn,$query);
            var_dump($result);
        ?>
    </div>

    <div class="block">
        <h2>Base de datos - php - leer- volcado de datos</h2>
        <h3>volcado de datos con metedo fetch_assoc</h3>
        <p>
            Tercer paso - volcado de datos de la base de datos <br>
            Mientras $result tenga filas <br>
            convierte cada fila en un array asociativo <br>
            Sólo se puede iterar una sola vez por $result!! <br>
            Por seguridad no se puede volver a leer <br>
        </p>
        <?php 
            while ($fila =$result->fetch_assoc()) {
               echo $fila['id']; echo "<br>";
               echo $fila['nombre']; echo "<br>";
               echo $fila['descripcion']; echo "<br>";
               echo $fila['precio']; echo "<br>";
               echo $fila['categoria']; echo "<br>";
               echo $fila['stock']; echo "<br>";
            }
            
        ?>
    </div>

    <div class="block">
        <h2>Base de datos - php - leer- volcado de datos</h2>
        <h3>volcado de datos con foreach (key y value)</h3>
        <p>
            Tercer paso - volcado de datos de la base de datos <br>
            Mientras $result tenga filas <br>
            convierte cada fila en un array asociativo <br>
            Sólo se puede iterar una sola vez por $result!! <br>
            Por seguridad no se puede volver a leer <br>
        </p>
        <?php 
             $query= "SELECT * FROM `productos`";
             $result= mysqli_query($conn,$query);
            while ($producto =$result->fetch_assoc()) {
               foreach ($producto as $campo => $valor) {
                   echo $campo.$valor;
               }
               echo "<br>";
            }
            
        ?>
    </div>

    <div class="block">
        <h2>Base de datos - php - leer - desconectar</h2>
        <h3>Desconexion</h3>
        <p>
            Cuarto paso - desconexion de la base de datos <br>
            mysqli_close($conn); <br>
            $conn es la conexión abierta en uso
        </p>
        <?php 
            mysqli_close($conn);
            
        ?>
    </div>
    <footer></footer>
</body>

</html>