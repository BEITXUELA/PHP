<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php condicion</title>
    <?php require('parts/head.html'); ?>
</head>

<body>
    <div data-site=".condicion" class="site"></div>

    <?php require_once('parts/header.html'); ?>
    <?php include_once('parts/menu.html'); ?>

    <div class="block">
        <h2>condicion php - if</h2>
        <p>
            if(condicion){ <br>
            #code <br>
            }
        </p>
        <?php 
         $nombre = 'Pedro';
         if ($nombre == 'Pedro') {
            echo "es Pedro";
         }
        ?>
    </div>


    <div class="block">
        <h2>condicion php - if else</h2>
        < <p>
            if(condicion) <br>
            #code... ;<br>
            }<br>
            else{ <br>
            #code... ;<br>
            } <br>
            </p>
            <?php 
        $nombre = 'Juan';
        if ($nombre == 'Pedro') {
           echo "es Pedro";
        }
        else{
            echo "no es Pedro";
        }
        ?>
    </div>

    <div class="block">
        <h2>condicion php - if else if else</h2>
        <p>
            if(condicion) <br>
            #code... ;<br>
            }<br>
            elseif{ <br>
            #code... ;<br>
            } <br>
            else{<br>
            #code... ;<br>
            }<br>

        </p>
        <?php 
        $nombre = 'Pepe';
        if ($nombre == 'Pedro') {
           echo "es Pedro";
        }
        elseif ($nombre == 'Juan') {
            echo "es Juan";
        }
        else{
            echo "no es nadie del grupo";
        }
        ?>
    </div>


    <div class="block">
        <h2>condicion php - switch case</h2>
        <p>

        </p>
        <?php 
        $variable=5;
        switch ($variable) {
            case '4':
                echo "el valor es 4";
                break;
            case '5':
                echo "el valor es 5";
                 break;
            case $variable<6:
                echo "el valor es inferior a 6";
                break;        
            default:
                echo "el valor es diferente a 4";
                break;
        }
        ?>
    </div>

    <div class="block">
        <h2>condicion php - switch case</h2>
        <p>
            esto es un ejemplo con un fallo, al quitar el break se ejecutan todos los casos
        </p>
        <?php 
        $variable=4;
        switch ($variable) {
            case '4':
                echo "el valor es 4";
            case '5':
                echo "el valor es 5";
                 //break;
            case $variable<6:
                echo "el valor es inferior a 6";
                break;        
            default:
                echo "el valor es diferente a 4";
                break;
        }
        ?>
    </div>

    <div class="block">
        <h2>condicion php - switch case</h2>
        <p>
        </p>
        <?php 
        $variable=4;
        switch ($variable) {
            case ($variable==4)and ($variable<6):
                echo "el valor es 4";
                echo "el valor es inferior a 6";
            case '5':
                echo "el valor es 5";
                 break;
            case $variable<6:
                echo "el valor es inferior a 6";
                break;        
            default:
                echo "el valor es diferente a 4";
                break;
        }
        ?>
    </div>

    <div class="block">
        <h2>condicion php - switch case</h2>
        <p>

        </p>
        <?php 
        $variable=5;
        switch ($variable) {
            case ($variable === "5"): //=== idéntico en valor y tipo
                echo "el valor es 5. <br>";
                echo "el valor no es numérico. <br>";
                echo " el valor es un String. <br>";
                var_dump($variable);
                break;  
            case ($variable === 5):
                echo "el valor es 5. <br>";
                echo "el valor es numérico. <br>";
                var_dump($variable);
                break;         
        }
        ?>
    </div>

    <footer></footer>
</body>

</html>