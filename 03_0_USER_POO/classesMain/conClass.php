<?php 
    class Con{
        public $host;
        public $user;
        public $pass;
        public $db;
        public $port;

        public $con;

        //constructor:
        public function __construct($host,$user,$pass,$db,$port)
        {
            $this->host=$host;
            $this->user=$user;
            $this->pass=$pass;
            $this->db=$db;
            $this->port=$port;
            $con= mysqli_connect($host,$user,$pass,$db,$port);
            $this->con=$con;
           
        }
        //metodo para desconectar:
        public function descon(){
            mysqli_close($this->con);
        }

        //METODO DE QUERY
        public function query($query){
            $result = mysqli_query($this->con, $query);
            return $result;
        }
    
    }




 ?>