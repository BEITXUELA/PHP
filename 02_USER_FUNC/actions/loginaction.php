<?php
     require_once('../functions/conexion.php'); //se necesita xk se usa en functiones usuario
     require_once('../functions/usuario.php');
     require_once('../functions/helper.php');
    //var_dump($_REQUEST); 

    session_start();
    //datos recogidos del form:
    $usuario_form=$_REQUEST["usuario"];
    $clave_form=$_REQUEST["clave"];

    // echo $usuario_form;
    // echo $clave_form;

    //CONTROLES:
    //controlamos si hay algún campo vacio:
    $vacios= campos_vacios($_REQUEST);
    if ($vacios) {
        header('Location:../index.php'); die;
    }    
    // if($campos_vacios($_REQUEST)==true){
    //     header('Location:../index.php'); die;
    // }
    // if ($vacios) { es igual a la anterior, x defecto coge true
    //     # code...
    // }
    // if (($usuario_form=='')or($clave_form=='')) {
    //     header('Location:../index.php'); die;
    // }//no traga el login con usuario o clave vacio

    //datos a comparar - se podrían cargar de 
    //una bbdd- aquí simulación
    // $usuario_base="gregor_gh@yahoo.es";
    //$clave_base="12345678";

    //ir a la bbdd:
    $query="SELECT * FROM `usuarios` WHERE `usuario` = '$usuario_form'";
    $resultado= consultar($query);

    // $con=mysqli_connect('localhost','root','','ident');
    // $query="SELECT * FROM `usuarios` WHERE `usuario` = '$usuario_form'";
    // $resultado=mysqli_query($con, $query);
    // //var_dump($resultado);
    // //echo "<br>";

    $identificado=usuario_ident($resultado,$_REQUEST);   

    if ($identificado==true) {
        $_SESSION['identificado']=true;
        $_SESSION["usuario"]=$usuario_form;
        $_SESSION['role']= usuario_role($usuario_form);
        //$_SESSION['role']= $_SESSION['role'][0];
        $fecha= date('Y-m-d H:i:s'); //var_dump($fecha); //die;
        $fecha_anterior=usuario_lastlogin($fecha);
        $_SESSION["nombre"]= usuario_nombre($usuario_form);
        $_SESSION['profileroute']=usuario_imagen_perfil('leer',$usuario_form,'');
        //usamos la funcion que esta en usuario
         $resetear=  usuario_resetear($_REQUEST['usuario']);
        if ($resetear==1) {
            $_SESSION["mensaje"]['texto']="Debes cambiar tu contraseña";
            $_SESSION['mensaje']['tipo']='warning';
            $_SESSION['reset']=1;
            //si SI está identificado le envio a la vista reset_password
            header("Location:../reset_password.php"); die; 
        }else{
            $_SESSION["mensaje"]['texto']="Conexión con exito <br>";
            if ($fecha_anterior!= NULL) {
                $_SESSION["mensaje"]['texto'].="Último login ".$fecha_anterior;
            }
            $_SESSION['mensaje']['tipo']='success';
            //si NO está identificado le volvemos a mandar al inicio 
            header("Location:../index.php"); die;
        }
    } 
        irA('../index.php'); die;
        //header("Location:../index.php"); die;
        //envio a index con errores en sesion de user_ident

    // while ($fila = $resultado->fetch_assoc()) {
    //     $usuario_base=$fila['usuario'];
    //     $clave_base=$fila['clave'];
    // }
    // mysqli_close($con);

    // if (!isset($usuario_base)) {
    //     $usuario_base= NULL;
    // }
    // if(!isset($clave_base)){
    //     $clave_base=NULL;
    // }
    // echo $usuario_base;
    // echo "<br>";
    // echo $clave_base;
    //die;

    // if ($usuario_form!=$usuario_base) {
    //     $_SESSION['mensaje']="Usuario Incorrecto!!";
    //     header("Location:../index.php"); die;
    // }

    // if ($clave_form!=$clave_base) {
    //     $_SESSION['mensaje']="Contraseña Incorrecta!!";
    //     header("Location:../index.php"); die;
    // }

    //autentificar usuario:
    // $_SESSION['identificado']=true;
    // //die('end');
    // $_SESSION["usuario"]=$usuario_form;
    // $_SESSION["mensaje"]="Conexión con exito";
    // header("Location:../index.php"); die;

 ?>
 
 