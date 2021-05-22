<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bucle -loop php</title>
    <?php require('parts/head.html'); ?>
</head>

<body>
    <div class="site" data-site=".bucle"></div>

    <?php require_once('parts/header.html'); ?>
    <?php include_once('parts/menu.html'); ?>

    <div class="block">
        <h2>bucles php - loop</h2>
        <p>
            bucle for
        </p>
        <p>
            <?php 
        for ($i=1; $i <=10 ; $i++) { 
            echo $i;
            echo('<br>');
        }
        ?>
        </p>
    </div>

    <div class="block">
        <h2>bucles php - while</h2>
        <p>
            bucle while
        </p>
        <p>
            <?php 
        $a=1;
        while ($a <= 10) {
            echo $a.'<br>';
            $a++;
        }
     ?>
        </p>
    </div>

    <div class="block">
        <h2>bucles php - do while - post checked -control porsterior</h2>
        <p>
            bucle do while
            por lo menos se hace 1 una vez
        </p>
        <p>
            <?php 
        $a=1;
        do {
            echo $a.'<br>';
           $a++;
        } while ($a <= 10);
     ?>
        </p>
    </div>

    <div class="block">
        <h2>bucles php - for each</h2>
        <p>
            bucle for each con array indexado
        </p>
        <p>
            <?php 
             //por cada elemento del $ variable dame su key(índice) y su valor(value);
            $variable= array('A','B','C');
            foreach ($variable as $key => $value) {
                echo $key.' => '.$value;
                echo '<br>';
            }
        
     ?>
        </p>
    </div>

    <div class="block">
        <h2>bucles php - for each </h2>
        <p>
            otro bucle for each con array asociativo
        </p>
        <p>
            <?php 
            $usuario= array(
                'nombre'=> 'Miguel',
                'apellido' => 'Lorenzo',
                'email'=> 'morgis666@gmail.com'
            );
            $usuario['edad']=29;
            $usuario['nombre']='SuperMiguel';
            foreach ($usuario as $llave => $valor) {
                echo $llave.' => '.$valor;
                echo '<br>';
            }
     ?>
        </p>
    </div>

    <div class="block">
        <h2>bucles php - for each </h2>
        <p>
            for each sobre un array indexado($usuarios) asociativo($usuario1 y $usuario2)
            otro bucle for each con 2 arrays
        </p>
        <p>
            <?php 
            $usuario1= array(
                'nombre'=> 'Miguel',
                'apellido' => 'Lorenzo',
                'email'=> 'morgis666@gmail.com'
            );
            $usuario1['edad']=29;
            $usuario1['nombre']='SuperMiguel';

            $usuario2= array(
                'nombre'=> 'Maio',
                'apellido' => 'Bros',
                'email'=> 'mario@gmail.it'
            );
            $usuario2['edad']=15;
            $usuario2['nombre']='SuperMario';
           $usuarios=array($usuario1,$usuario2); 
           //var_dump($usuarios);
           foreach ($usuarios as $key => $usuario) {
               echo $key; 
               echo '<br>';
              // echo var_dump($usuario);
               //echo '<br>';
               echo $usuario['nombre'];
               foreach ($usuario as $key => $value) {
                   echo $key.' => '.$value.'<br>';
                   
               }
           }
          
     ?>
        </p>
    </div>


    <footer></footer>
</body>

</html>