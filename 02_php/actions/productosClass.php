<?php 

    class Producto
    {
        public $id;
        public $nombre;
        public $precio_euros;
        public $precio_centimos;
        public $stock;
        public $des;

    public function getProductos($con){
            $query="SELECT * FROM `productos` ";
            $result=mysqli_query($con,$query);
            
            $productos = array();
            while($fila = $result->fetch_assoc()){
                $dato = $fila;
                array_push($productos, $dato);
            };
            return $productos;
        }

    }
    

 ?>
