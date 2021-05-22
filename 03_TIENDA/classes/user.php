<?php 

    class User extends Con{
        public $id;
        public $nombre;
        public $usuario; //esto es el mail
        public $clave;
        public $claves;
        public $reset;
        public $role;
        public $lastlogin;
        public $profileroute;

        
        public function buscar_usuario($mail){ 
            $query = "SELECT * FROM `usuarios` WHERE `usuario` = '$mail' ";
            $resultado = mysqli_query($this->con, $query);
            //$fila = $resultado->fetch_all(MYSQLI_ASSOC); echo count($fila);
            //echo '<pre>'; var_dump($fila); echo '</pre>'; die;
            while($fila = $resultado->fetch_assoc() ) {
                $this->usuario = $mail; //$fila['usuario'];
                $this->clave = $fila['clave'];
                return true; break; exit;
            };
            return false;
        }

        public function comprobar_clave($clave_form){ //echo $this->clave.'<br>'.$clave_form; die;
            return $this->comparar($clave_form);
        }

        private function comparar($clave_form){
            return password_verify($clave_form, $this->clave);
        }

        //uso en loginaction u otras partes
        public function getUser($mail){
            $query = "SELECT * FROM `usuarios` WHERE `usuario` = '$mail' ";
            $resultado = mysqli_query($this->con, $query);

            while($fila = $resultado->fetch_assoc()){
                $user = $fila;
            };

            foreach ($user as $key => $value) { //echo $key.' '.$value.'<br>';
                $this->$key=$value;
            }
            return $user;
        }

        // public function setNewLastLogin(){ //vosotros $con
        //     $now = date('Y-m-d H:i:s'); //echo '<pre>'; var_dump($now); echo '</pre>'; die;
        //     $query = "UPDATE `usuarios` SET `lastlogin` = '$now' WHERE `usuarios`.`usuario` = '$this->usuario' ";
        //     mysqli_query($this->con, $query);
        //     return;
        // }

        public function setUserPass($clave){
            $clave_encriptada = $this->encriptar($clave);
            
            //campo claves
            $claves_array = json_decode($this->claves);
            foreach ($claves_array as $key => $value) {
                $clave_coincidente = password_verify($clave, $value);
                if($clave_coincidente == true){
                    return false; break;
                }
            }
            
            $this->clave = $clave_encriptada;
            array_push($claves_array, $clave_encriptada);

            while (count($claves_array) > 3) {
                array_shift($claves_array);
            }
            
            $claves_json = json_encode($claves_array);
            $this->claves = $claves_json;
            return true;
        }

        public function updateUserField($campo, $contenido){ //vosotros $con
            $this->lastlogin = $contenido;
            $query = "UPDATE `usuarios` SET `$campo` = '$contenido' WHERE `usuarios`.`usuario` = '$this->usuario' ";
            mysqli_query($this->con, $query);
            return;
        }

        public function update(){
            $query = "UPDATE `usuarios` SET `nombre` = '$this->nombre', `usuario` = '$this->usuario', `clave` = '$this->clave', `claves` = '$this->claves', `reset` = '$this->reset', `role` = '$this->role', `lastlogin` = '$this->lastlogin', `profileroute` = '$this->profileroute' WHERE `usuarios`.`id` = $this->id ";
            mysqli_query($this->con, $query);
            return;
        }

        public function crearUsuario($params){
            $params['clave'] = $this->encriptar($params['clave']);
            $query = "INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`, `claves`, `reset`, `role`, `lastlogin`, `profileroute`) 
            VALUES (NULL, '$params[nombre]', '$params[mail]', '$params[clave]', '[]', '0', 'usuario', NULL, NULL) ";
            mysqli_query($this->con, $query);
            return;
        }

        private function encriptar($clave){
            return password_hash($clave, PASSWORD_DEFAULT);
        }

        public function RandomString($numero = 8){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring = '';
            for ($i = 0; $i < $numero; $i++) {
                $randstring .= $characters[rand(0, strlen($characters)-1)];
            }
            $clave_encriptada = $this->encriptar($randstring);
            $this->clave = $clave_encriptada;
            return $randstring;
        }


        public function resetUser(){


        }
        

        // public function update(){
        //     $query = "";
        //     $this->query($query);
        //     return;
        // }


    }
    

?>