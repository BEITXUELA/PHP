<?php 
    //loader main classes
    $classesMain=glob('classesMain/*.php');
    foreach ($classesMain as $key => $main) {require_once($main);}
    //echo 'loader: <br>';
    //require_once('classesMain/conClass.php');
    if (count($classesMain)==0) {
        $classesMain=glob('../classesMain/*.php');
        foreach ($classesMain as $key => $main) {require_once($main);}
    }

    if (count($classesMain)==0) {
        $classesMain=glob('../../classesMain/*.php');
        foreach ($classesMain as $key => $main) {require_once($main);}
    }

    if (count($classesMain)==0) {die('classesMain not found');}


    $classes=glob('classes/*.php');
    //echo '<pre>'; var_dump($classes); echo '</pre>';
    foreach ($classes as $key => $class) {
        require_once($class);
    }
    //echo '<pre>'; var_dump($class); echo '</pre>';
    // $dir='classes/';
    // $classes=scandir($dir);
    // echo '<pre>'; var_dump($classes);echo '</pre>';
    //die;

    if (count($classes)==0) {
        $classes=glob('../classes/*.php');
        foreach ($classes as $key => $class) {
            require_once($class);
        }
    }

    
    if (count($classes)==0) {
        $classes=glob('../../classes/*.php');
        foreach ($classes as $key => $class) {
            require_once($class);
        }
    }

    if (count($classes)==0) {die('classes not found');}

    //SCRIPT
    session_start(); //arrancar session
    $Session= new Session(); //ejecuta constructor automaticamente en clase Session
    $Mensaje=new Mensaje(); 
    $mensaje=$Mensaje->usarMensajes();

?>
