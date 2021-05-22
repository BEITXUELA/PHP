<?php 
    $Site= array(
        'indexAction'=>'SiteController',
        'open_signupAction'=>'SiteController',
        'open_resetAction'=>'SiteController',
    );

    $Auth= array(
        'loginAction'=>'AuthController',
        'logoutAction'=>'AuthController',
    );

    $routes=array_merge($Auth,$Site);

 ?>
