<?php 
    require_once('../loader/loader.php');
    $action=$_REQUEST['action'];
    //echo '<pre>'; var_dump($action);echo '</pre>';//die;
    require_once('routes.php');

    array_key_exists($action,$routes)?$ConTroller=$routes[$action]:die('route not found');
    var_dump($ConTroller);

    $ActionConTroller=new $ConTroller();
    $ActionConTroller->$action();
    
    die('in router');
?>
