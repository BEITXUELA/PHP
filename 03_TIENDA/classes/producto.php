<?php 
    class Producto extends Con{
        public $id;
        public $nombre;
        public $categoria;
        public $descripcion;
        public $precio;
        public $stock;


        public function leerProductos(){
            $consulta="SELECT * FROM `productos`";
            $resultado=mysqli_query($this->con,$consulta);

            $productos=array();
            while ($fila=$resultado->fetch_assoc()) {
                $miproducto['id']=$fila['id'];
                $miproducto['nombre']=$fila['nombre'];
                $miproducto['categoria']=$fila['categoria'];
                $miproducto['descripcion']=$fila['descripcion'];
                $miproducto['precio']=$fila['precio'];
                $miproducto['stock']=$fila['stock'];

                array_push($productos,$miproducto);

            }
            //$productos=$resultado->fetch_all(MYSQLI_ASSOC);
            return $productos;
            
        }

    }






?>
