<?php 

    class Con{
        
        const host = "localhost";
        const user = "root";
        const pass = "";
        public $db;
        const port = '3306';
        public $con;

        public function __construct($db){
            //$this->host = $host;
            //$this->user = $user;
            //$this->pass = $pass;
            $this->db = $db;
            //$this->port = $port;
            $con = mysqli_connect(self::host, self::user, self::pass, $db, self::port);
            $this->con = $con;
        }

        public function descon(){
            mysqli_close($this->con);
        }

        public function query($query){
            $result = mysqli_query($this->con, $query);
            return $result;
        }
    

    }




?>