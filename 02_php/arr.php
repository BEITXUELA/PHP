<?php 
    $br = "<br>"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 1 - array</title>
    <?php require('parts/head.html'); ?>
</head>
<body>
<div class="site" data-site=".array"></div>

    <?php require_once('parts/header.html'); ?>
    <?php include_once('parts/menu.html'); ?>

    <div class="block">
        <h2>variables php - array - indexado</h2>
        <p>
            definir variable en php : $arr = array(elemento, elemento ....);
        </p>
        <?php
            $nombres = array('pedro', 'juan', 'amalia');
            echo "<p>";
                var_dump($nombres); 
            echo "</p>";

            echo ( '<p>echo del segundo elemento: '.$nombres[2].'</p>' );
        ?>
    </div>

    <div class="block">
        <h2>variables php - array - indexado indexado</h2>
        <p>
            definir variable en php : $arr = array(elemento, elemento ....);
        </p>
        <?php
            $nombres = array('pedro', 'juan', 'amalia');
            echo "<p>";
                var_dump($nombres); 
            echo "</p>";
            echo ( '<p>echo del segundo elemento: '.$nombres[2].'</p>' );
            echo ( '<p>echo de la primera letra del segundo elemento: '.$nombres[2][0].'</p>' );
        ?>
    </div>

    <div class="block">
        <h2>variables php - array - indexado - añadir - sustituir</h2>
        <p>
            definir variable en php : $arr = array(elemento, elemento ....);
        </p>
        <?php
            $nombres = array('pedro', 'juan', 'amalia');
            echo "<p>";
                var_dump($nombres); 
            echo "</p>";

            $nombres[] = 'sebastian';
            echo "<p>"; var_dump($nombres);  echo "</p>";

            $nombres[1] = 'pepe';
            echo "<p>"; var_dump($nombres);  echo "</p>";

            echo ( '<p>echo del segundo elemento: '.$nombres[2].'</p>' );
        ?>
    </div>

    <div class="block">
        <h2>variables php - array - indexado - unset</h2>
        <p>
            definir variable en php : $arr = array(elemento, elemento ....);
        </p>
        <?php
            $nombres = array('pedro', 'juan', 'amalia');
            echo "<p>"; var_dump($nombres); echo "</p>";

            unset($nombres[1]); //unset - borrar variable
            echo "<p>"; var_dump($nombres); echo "</p>";

            unset($nombres);
            echo "<p>"; var_dump($nombres); echo "</p>";
        ?>
    </div>

    <div class="block">
        <h2>variables php - array - asociativo</h2>
        <p>
            definir variable en php : $arr = array(key => elemento, key => elemento ....);
        </p>
        <?php
            $usuario = array('nombre'=>'pedro', 'apellido'=>'juan', 'mail'=>'m@m.es');
            echo "<p>"; var_dump($usuario); echo "</p>";

            $edades = array(
                'pedro' => 37,
                'juan' => '22',
                'amalia' => 32
            );

            echo "<p>"; var_dump($edades); echo "</p>";

            unset($usuario['mail']);
            echo "<p>"; var_dump($usuario); echo "</p>";

        ?>
    </div>

    <div class="block">
        <h2>variables php - array - indexado asociativo</h2>
        <p>
            definir variable en php : $arr = array(key => elemento, key => elemento ....);
        </p>
        <?php
            $usuario1 = array('nombre'=>'pedro', 'apellido'=>'juan', 'mail'=>'m@m.es');
            $usuario2 = array('nombre'=>'pedro', 'apellido'=>'juan', 'mail'=>'m@m.es');
            echo "<p>"; var_dump($usuario1); echo "</p>";
            echo "<p>"; var_dump($usuario2); echo "</p>";

            $usuarios = array(
                $usuario1,
                $usuario2
            );

            echo "<p>"; var_dump($usuarios); echo "</p>";

        ?>
    </div>

    
    


    <footer></footer>
</body>
</html>