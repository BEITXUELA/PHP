<?php

    //loader main classes
    $classesmain = glob('classesmain/*.php');
    foreach ($classesmain as $key => $main) {require_once($main);}
    if(count($classesmain)==0 ){
        $classesmain = glob('../classesmain/*.php');
        foreach ($classesmain as $key => $main) {require_once($main);}
    }
    if(count($classesmain)==0 ){
        $classesmain = glob('../../classesmain/*.php');
        foreach ($classesmain as $key => $main) {require_once($main);}
    }
    if (count($classesmain) == 0) { die('classesmain not found');}
    


    //loader classes
    $classes = glob('classes/*.php');
    //echo '<pre>'; var_dump($classes); echo '</pre>'; die;
    foreach ($classes as $key => $class) {require_once($class);}
    if (count($classes) == 0) {
        $classes = glob('../classes/*.php');
        foreach ($classes as $key => $class) {require_once($class);}
    }
    if (count($classes) == 0) {
        $classes = glob('../../classes/*.php');
        foreach ($classes as $key => $class) {require_once($class);}
    }
    if (count($classes) == 0) { die('classes not found');}

    session_start();
    $Session = new Session(); //ejecuta constructor automaticamente que corresponde a comenzarSession
    $Mensaje = new Mensaje();
    $Con = new Con('ident');
    $mensaje = $Mensaje->mensaje;

?>