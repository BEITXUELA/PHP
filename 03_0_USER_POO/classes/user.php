<?php 

class User{

    //propiedades
    public $id;
    public $nombre;
    public $usuario; //email
    public $clave;
    public $claves;
    public $reset;
    public $role;
    public $lastlogin;
    public $profileroute;

    //metodo para buscar en usuario en la bbdd
    public function buscarUsuario($mail,$con){
        $query="SELECT * FROM `usuarios` WHERE `usuario`= '$mail'";
        $resultado=mysqli_query($con,$query);
        while($fila = $resultado->fetch_assoc()){
            $this->usuario=$mail; //o $fila['usuario'];
            $this->clave=$fila['clave'];
            return true; break;
        };
        return false;
    }

    //metodo para comprobar clave
    public function comprobarClave($claveForm){
       // echo $this->clave.'<br>'.$claveForm; die;
        return $this->comparar($claveForm);
        // if ($claveForm==$this->clave) {
        //    return true;
        // }

        // return false;
    }

    //metodo para comparar las claves
    private function comparar($claveForm){
        return password_verify($claveForm,$this->clave);
        
    }

    //uso en loginaction u otras partes
    public function getUser($mail,$con){
        $query="SELECT * FROM `usuarios` WHERE `usuario`= '$mail'";
        $resultado=mysqli_query($con,$query);
        
        while($fila = $resultado->fetch_assoc()){
            $user = $fila;
            
        };

        // $this->id=$user['id'];
        // $this->nombre=$user['nombre'];
        // $this->usuario=$user['usuario'];
        // $this->clave=$user['clave'];
        // $this->claves=$user['claves'];
        // $this->reset=$user['reset'];
        // $this->role=$user['role'];
        // $this->lastlogin=$user['lastlogin'];
        // $this->profileroute=$user['profileroute'];
        
        //meter los datos, correspondería al código de la 55 a la 63
        foreach ($user as $key => $value) {
            //echo $key.' : '.$value.'<br>';
            $this->$key=$value;
        }

        return $user;
    }

    //metodo para actualizar solo el lastlogin
    public function setNewLastLogin($con){
        $now= date('Y-m-d H:i:s');
        $query="UPDATE `usuarios` SET `lastlogin` = '$now' WHERE `usuarios`.`usuario` = '$this->usuario'";
        mysqli_query($con,$query);
        return;
    }

    //metodo para actualizar un campo
    public function updateUserField($con,$campo,$contenido){
        $query="UPDATE `usuarios` SET `$campo` = '$contenido' WHERE `usuarios`.`usuario` = '$this->usuario'";
        mysqli_query($con,$query);
        return;
    }

    //metodo para actualizar:
    public function update($con){
        $query="UPDATE `usuarios` SET `nombre` = '$this->nombre', `usuario` = '$this->usuario', `clave` = '$this->clave', `claves` = '$this->claves', `reset` = '$this->reset', `role` = '$this->role', `lastlogin` = '$this->lastlogin', `profileroute` = '$this->profileroute' WHERE `usuarios`.`id` = $this->id";
        $result=mysqli_query($con,$query);

        return;
    }

    //metodo para crear un nuevo usuario:
    public function saveUser($params,$con){
        $params['clave']=$this->encriptar($params['clave']);
        $query="INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`, `claves`, `reset`, `role`, `lastlogin`, `profileroute`) 
        VALUES (NULL, '$params[nombre]', '$params[mail]', '$params[clave]', '', '0', 'usuario', NULL, NULL)";
        mysqli_query($con,$query);

        return;
    }

    private function encriptar($clave){
        $clave_encriptada= password_hash($clave, PASSWORD_DEFAULT);
        return $clave_encriptada;
    }


    public function RandomString($numero=8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $numero; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        $clave_encriptada=$this->encriptar($randstring);
        $this->clave=$clave_encriptada;
        return $randstring;
    }

   public function setUserPass(){
       
   }



}








?>
