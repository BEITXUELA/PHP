<?php 
    function entorno()
    {
        $entorno='desarrollo';
        //$entorno='produccion';
        return $entorno;
    }
    function conectar(){
        $con = mysqli_connect('localhost','root','','ident','3306');
         return $con;
    }
    function desconectar(){
        $con=conectar();
        mysqli_close($con);
        return;
    }
    function consultar($query){
        $con = conectar();
        $result= mysqli_query($con,$query);
        desconectar();
        return $result;
    }
?>