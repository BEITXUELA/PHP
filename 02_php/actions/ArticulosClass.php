<?php 

    class Articulo
    {
        public $id;
        public $nombre;
        public $contenido;

    public function getArticulos($con){
            $query="SELECT * FROM `articulos` ";
            $result=mysqli_query($con,$query);
            
            $articulos = array();
            while($fila = $result->fetch_assoc()){
                $dato = $fila;
                array_push($articulos, $dato);
            };
            return $articulos;
        }

    }
    

 ?>
