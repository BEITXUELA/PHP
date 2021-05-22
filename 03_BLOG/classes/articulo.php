<?php 
    class Articulo extends Con{
        public $id;
        public $tema;
        public $contenido;
        public $keywords;


        public function leerArticulos(){
            $query="SELECT * FROM `articulos`";
            $resultado=mysqli_query($this->con,$query);

            $articulos=array();
            while ($fila=$resultado->fetch_assoc()) {
                $miarticulo['id']=$fila['id'];
                $miarticulo['tema']=$fila['tema'];
                $miarticulo['contenido']=$fila['contenido'];
                $miarticulo['keywords']=$fila['keywords'];

                $keywords_array=json_decode($miarticulo['keywords']);
                $keywords_text='';
                foreach ($keywords_array as $key => $value) {
                   $keywords_text.=$value.' ';
                }
                $miarticulo['keywords']=$keywords_text;
                array_push($articulos,$miarticulo);

            }
            return $articulos;
            
        }

        public function leerUnArticulo($id){
            $this->id=$id;
            $query="SELECT * FROM `articulos` WHERE `id` = '$this->id'";
            $resultado=mysqli_query($this->con,$query);

            $articulo=$resultado->fetch_all(MYSQLI_ASSOC);
            //echo '<pre>'; var_dump($articulo); echo '</pre>';
            return $articulo;



        }

        

        public function getTable($articulos){

            $table = "<table border='1'>";
            $table.="<tr><th>TEMA</th><th>CONTENIDO</th><th>KEYWORDS</th><th>VER</th></tr>";
            foreach ($articulos as $key => $miarticulo) { 
               echo '<pre>';
               //var_dump($miarticulo);
               echo '</pre>';
                $table.="<tr>";
                $table.="<td>$miarticulo[tema]</td>";
                $table.="<td>$miarticulo[contenido]</td>";
                $table.="<td>$miarticulo[keywords]</td>";
                $table.="<td><a href='tema_blog.php?id=$miarticulo[id]'>Ver Artículo</a></td>";
                $table.="</tr>";
            }
            $table.= "</table>";
            return $table;
        }


        public function getTableAdmin($articulos){
            $table = "<table border='1'>";
            $table.="<tr><th>DELETE</th><th>TEMA</th><th>CONTENIDO</th><th>KEYWORDS</th><th>EDIT</th></tr>";
            foreach ($articulos as $key => $miarticulo) { 
               echo '<pre>';
               //var_dump($miarticulo);
               echo '</pre>';
                $table.="<tr>";
                $table.="<td><a href='admin_delete.php?id=$miarticulo[id]'>Borrar Artículo</a></td>";
                $table.="<td>$miarticulo[tema]</td>";
                $table.="<td>$miarticulo[contenido]</td>";
                $table.="<td>$miarticulo[keywords]</td>";
                $table.="<td><a href='admin_editar.php?id=$miarticulo[id]'>Editar Artículo</a></td>";
                $table.="</tr>";
            }
            $table.= "</table>";
            return $table;
        }


        public function CrearUnArticulo($id){
            $this->id=$id;
            $query="INSERT INTO `articulos` (`id`, `tema`, `contenido`, `keywords`) 
            VALUES (NULL, 'KAKA', 'KAKA', '[\"KAKA\"]') ";
            $resultado=mysqli_query($this->con,$query);

           
            return;

        }


        public function borrarUnArticulo($id){
            $this->id=$id;
            $query="DELETE FROM `articulos` WHERE `id` = '$this->id'";
            $resultado=mysqli_query($this->con,$query);

           
            return;

        }









    }



?>
