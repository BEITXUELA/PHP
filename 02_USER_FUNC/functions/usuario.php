<?php 
   
   //función para verificar si el usuario existe
    function usuario_existe($usuario_buscado){
        $usuario_existe=false;

        // $con = mysqli_connect('localhost','root','','ident','3306');
        // $result= mysqli_query($con,$query);
        // mysqli_close($con);

        $query="SELECT * FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario_buscado'";
        $result=consultar($query);//es una función de conexion
        
          //var_dump($result); die;
        while ($result->fetch_assoc()) {
            $usuario_existe=true;
        }
        return $usuario_existe;
    }

    //funcion para crear un usuario en la bbdd
    function usuario_crear($params){
        //recoger datos - conexión - query - desconexion
        //ahora tb queremos encriptar la clave
        $clave_encriptada=password_hash($params['clave'],PASSWORD_DEFAULT);// echo $clave; die;
        
        //json convierte en array en la bbdd
        //JSON son las siglas de JavaScript Object Notation y es una sintaxis para almacenar e intercambiar datos.
        //Dado que el formato JSON es un formato basado en texto, puede enviarse fácilmente
        // desde y hacia un servidor y utilizarse como formato de datos por cualquier lenguaje de programación.
        //PHP tiene algunas funciones integradas para manejar JSON: json_encode() y json_decode().
        $claves_array[]=$clave_encriptada;
        $claves_json=json_encode($claves_array);

        $query= "INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`,`claves`,`reset`,`role`,`lastlogin`) VALUES (NULL, '$params[nombre]', '$params[mail]', '$clave_encriptada','$claves_json','0','usuario',NULL)";
        $control=consultar($query);
        // if ($control==false) {
        //     die('insertar con error');
        // }
        return $control;
    }

    //función para controlar si el usuario está identificado
    function usuario_ident($resultado, $login_campos){

        while ($fila = $resultado->fetch_assoc()) {
            $usuario_base=$fila['usuario'];
            $clave_base=$fila['clave'];
     }

    //echo $clave_base; echo "<br>"; die;

        $usuario_form=$login_campos['usuario'];
        $clave_form=$login_campos['clave'];

            
            if ($usuario_form!=$usuario_base) {
                $_SESSION['mensaje']['texto']="Usuario Incorrecto!!";
                $_SESSION['mensaje']['tipo']="danger";

                return false;
            }

            $clave_correcta= password_verify($clave_form,$clave_base);
            if ($clave_correcta==false) {
                $_SESSION['mensaje']['texto']="Contraseña Incorrecta!!";
                $_SESSION['mensaje']['tipo']="danger";
                return false;
            }
            
            return true;

            //echo  $clave_correcta; die;
            // $clave_form_encriptada= password_hash($clave_form,PASSWORD_DEFAULT);
            // echo $clave_form_encriptada; die;
            //  if ($clave_form!=$clave_base) {
            //         $_SESSION['mensaje']="Contraseña Incorrecta!!";
            //         return false;
            //     }
                // return true;
    }

    //funcion que resetea la clave y el reset 
     function usuario_reset($usuario) //hemos creado una columna en usuarios, llamada reset tipo boolean
        {    
        //copiar clave actual de la bbdd al campo claves en bbdd:
        //$clave_actual_base;
        
        //crear clave nueva codificada:
        $clave=RandomString(); //echo $clave; die; 
        $clave_encriptada=password_hash($clave,PASSWORD_DEFAULT);

        //guardar clave nueva del usuario:
            $query="UPDATE `usuarios` SET `clave` = '$clave_encriptada' WHERE `usuarios`.`usuario` = '$usuario';";
            consultar($query);   

        //cambiar el reset de la bbdd a positivo = 1
        $query="UPDATE `usuarios` SET `reset` = '1' WHERE `usuarios`.`usuario` = '$usuario';";
        consultar($query);  
        //PENDIENTE!!! enviar un email al usuario con la clave nueva desencriptada ($clave)

        return $clave;
    }

        //funcion que genera una clave aleatoria
        function RandomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 8; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }

    //funcion para resetear la clave
    function usuario_resetear($usuario)
    {
        $query="SELECT `reset` FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario'";
        $resultado=consultar($query);
        while ($fila = $resultado->fetch_assoc()) {
            $resetear=$fila['reset'];
        }
        return $resetear;
    }

    //función para dar/establecer clave y volver el reset a 0
    function usuario_setPassword($claves_limite,$clave,$usuario){

        $query="SELECT * FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario'";
        $result=consultar($query);
        while ($fila=$result->fetch_assoc()) {
            $claves_json=$fila['claves'];
        }
        $claves_array=json_decode($claves_json);
        
        //comparamos si la clave nueva de entrada ya la habia usado (claves)
        foreach ($claves_array as $key => $value) {
           $clave_coincidente= password_verify($clave,$value);
            if ($clave_coincidente) {
                return $set_password=false; //devuelve 
                break;
            }
        }
        //encriptar clave
        $clave_encriptada=password_hash($clave,PASSWORD_DEFAULT);

        //añadimos otra clave a nuestro array
        array_push($claves_array,$clave_encriptada);
        //$claves_length= count($claves_array); //array longitud
        //if ($claves_length>$claves_limite) {
        // array_shift($claves_array);//shift quita el primer elemento del array
        //limitar claves a clavea_limite = 3 entradas
        while (count($claves_array) > $claves_limite ) {
            array_shift($claves_array);//shift quita el primer elemento del array
        }
        //usamos json_encode para decodificar el array 
        $claves_json=json_encode($claves_array);

        //guardar clave nueva del usuario:
        $query="UPDATE `usuarios` SET `clave` = '$clave_encriptada' WHERE `usuarios`.`usuario` = '$usuario';";
        consultar($query);   

        //añadir clave nueva a claves del usuario con formato json:
        $claves_json=json_encode($claves_array);    
        $query="UPDATE `usuarios` SET `claves` = '$claves_json' WHERE `usuarios`.`usuario` = '$usuario';";
        consultar($query);  

        //cambiar el reset de la bbdd a positivo = 1
        $query="UPDATE `usuarios` SET `reset` = '0' WHERE `usuarios`.`usuario` = '$usuario';";
        consultar($query);  
        
        return $set_password=true;
    }

    // funcion para comparar clave actual con la de la bbdd
    function usuario_comparar_clave($clave_form,$usuario_buscado){
        //$clave_encriptada=password_hash($clave,PASSWORD_DEFAULT); //var_dump($clave_encriptada); die;
        $query="SELECT * FROM `usuarios` WHERE `usuario` = '$usuario_buscado'";
        $result=consultar($query);
        while ($fila=$result->fetch_assoc()) {
            $clave_base=$fila['clave'];
        }
        $clave_correcta= password_verify($clave_form,$clave_base);
        return $clave_correcta;
    }

    //funcion para el rol de los usarios
    function usuario_role($usuario_buscado)
    {
        $query="SELECT `role` FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario_buscado'";
        $result=consultar($query);
        while ($fila=$result->fetch_assoc()) {
            $role=$fila['role'];
        }
        return $role;
    }

    //funcion para mostrar la ultima conexion
    function usuario_lastlogin($fecha){
        $usuario =$_SESSION['usuario'];
        $query="SELECT `lastlogin` FROM `usuarios` WHERE `usuarios`. `usuario` = '$usuario'";
        $result=consultar($query);
        while ($fila=$result->fetch_assoc()) {
            $fecha_anterior=$fila['lastlogin'];
        }
        $query="UPDATE `usuarios` SET `lastlogin` = '$fecha' WHERE `usuarios`.`usuario` = '$usuario';";
        $control=consultar($query); //var_dump($control); die;  
        return $fecha_anterior;
    }

    //funcion para mostrar nombre de usuario
    function usuario_nombre($usuario_buscado){
        $query="SELECT `nombre` FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario_buscado'";
        $result=consultar($query);
        while ($fila=$result->fetch_assoc()) {
            $nombre=$fila['nombre'];
        }
        return $nombre;
    }
    function getUserId($usuario_buscado){
       $query="SELECT `id` FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario_buscado'";
       $result=consultar($query);
       while ($fila=$result->fetch_assoc()) {
        $user_id=$fila['id'];
        }
       return $user_id;
    }

    function usuario_imagen_perfil($variante,$usuario_buscado,$profileroute){
        if ($variante=='guardar') {
            $query="UPDATE `usuarios` SET `profileroute` = '$profileroute' WHERE `usuarios`.`usuario` = '$usuario_buscado';";
            consultar($query);
            return;
        }else {
            $query="SELECT `profileroute` FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario_buscado'";
       $result=consultar($query);
       while ($fila=$result->fetch_assoc()) {
        $profileroute=$fila['profileroute'];
        }
       // echo $profileroute; die;
       return $profileroute;
        }
        
    }
?>