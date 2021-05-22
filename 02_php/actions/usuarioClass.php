<?php 
    class Usuario{
        public $id;
        public $nombre;
        public $usuario; //mail
        public $clave;
        public $claves;
        public $reset;
        public $role;
        public $lastlogin;
        public $profileroute; 


        function crearUsuario($params,$con){
            //guardar en las cajas de Usuario
            $this->nombre=$params['nombre'];
            $this->usuario=$params['usuario'];
            $this->clave=$params['clave'];
            $this->role=$params['role'];

            $query="INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`, `claves`, `reset`, `role`, `lastlogin`, `profileroute`) 
            VALUES (NULL, '$this->nombre', '$this->usuario', '$this->clave', '', '0', '$this->role', NULL, NULL)";
            mysqli_query($link=$con,$query);

            return;
        }

        function leerUsuarios($con){
            $query="SELECT * FROM `usuarios`";
            $resultado=mysqli_query($con,$query);
            
            $usuarios = array();
            while($fila = $resultado->fetch_assoc()){
                $dato = $fila;
                array_push($usuarios, $dato);
            };
            return $usuarios;
        }

        function usuariosEnTabla($usuario_listado_array){
            var_dump($usuario_listado_array);
            $usuario1=$usuario_listado_array[0];
            $tabla= "<table>";
                $tabla.= "<tr>";
                $tabla.="<th>Borrar</th>";
                foreach ($usuario1 as $key => $value) {
                    $tabla.="<th>$key</th>";
                }
                $tabla.="<th>Editar</th>";
                $tabla.= "</tr>";
                
                foreach ($usuario_listado_array as $key => $value) {
                    $tabla.="<tr>";
                    $tabla.="<td>
                                <a data='.user_$value[id]' class='confirm'>Borrar</a>
                                <a class='d-none user_$value[id]' href='actions/user_deleteAction.php?usuario=$value[usuario]'>Confirmar</a>
                            </td>";
                        foreach ($value as $key => $item) {
                            $tabla.="<td>$item</td>";
                        }
                    $tabla.="<td><a href='actions/user_editAction.php?usuario=$value[usuario]'>Editar</a></td>";
                    $tabla.="</tr>";
                }
            $tabla.= "</table>";
            //echo $tabla; //var_dump($tabla);
            //die; 

            return $tabla;
        }

        function borrarUsuario($usuario,$con){ //var_dump($usuario); die;
            $query = "DELETE FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario'";
            mysqli_query($con,$query);
            return;

        }


        function leerUsuario($usuario,$con){
            $query = "SELECT * FROM `usuarios` WHERE `usuarios`.`usuario` = '$usuario'";
            $resultado=mysqli_query($con,$query);
            
            while($fila = $resultado->fetch_assoc()){
                $usuario_seleccionado = $fila;
            };

            return $usuario_seleccionado;
        }

        function updateUsuario($paramsOriginal,$params,$con){
            //var_dump($paramsOriginal); 
            //var_dump($params); die;
            //$id=$params[0];
            //$params=array_shift($params);
            foreach ($params as $key => $param) {
                $query = "UPDATE `usuarios` SET `$key`='$param' WHERE `id` = $paramsOriginal[id]";
                mysqli_query($con,$query);
            }
        
            return;
        }

    }




    


?>