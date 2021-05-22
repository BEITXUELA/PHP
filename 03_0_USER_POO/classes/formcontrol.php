<?php 
    class FormControl{
        //vacio hecho
        //email hecho 
        //string
        //length max
        //length min
        //match - coinciden

        public $mensaje=array('texto'=>'','tipo'=>'');

        //metodo para control de los campos
        function fieldControl($fields){
            //echo '<pre>';print_r($fields);echo '</pre>'; 
            foreach ($fields as $key => $field) {
                //echo $key."<br>";
                $key= substr($key,strpos($key,'/')+1);
                //echo $key; die;
                foreach ($field as $key2=>$check) {
                    //echo $check."<br>";
                    //realizar el control:
                    if ($check=='empty') {
                      $this->isEmpty($key); //echo "<br>";
                    }
                    if ($check=='email') {
                      //$key='pppp';
                     //var_dump($field); die;   
                     //echo $control=
                     $this->isEmail($key); //echo "<br>";
                    }
                    //EL PROFE ha quitadoo los if y ha puesto:
                    //$my_method = 'is_'.$check;  //echo $my_method; die; 
                    //$this->$my_method($key);
                    if ($check=='match') {
                        $this->isMatch($key); //echo "<br>";
                    }
                    if ($check=='minmax') {
                        $this->isMinMax($key); //echo "<br>";
                    }
                }
            }
            $_SESSION['mensaje']=$this->mensaje;
            //var_dump ($_SERVER);
            $referer= ($_SERVER['HTTP_REFERER']); //die;

            if ($this->mensaje['texto']!='') {
                header("Location: $referer");die;
            }
            return;
        }

        //metodo para match
        function isMatch($key){    
            //echo $key.'<br>'; //die;
            $pos=strpos($key,'?');
            $param1=substr($key,0,$pos) ;
            $param2=substr($key,$pos+1);
           // echo $param1.' '.$param2;die;

           if ($param1!=$param2) {
               $this->mensaje['texto'].='Campo/s no coinciden <br>';
               $this->mensaje['tipo']='warning';
           }

           return;
        }
        //    echo '<pre>';
        //    var_dump($this->mensaje);
        //    echo '</pre>'; die;
        //    echo '<pre>';
        //    var_dump($this->mensaje);
        //    echo '</pre>'; 
        //    die;
        
        //metodo para min max email
         function isMinMax($key){   
             $min=8;
             $max=24;
             $length= strlen($key); 
             if ($length<$min or $length>$max) {
                $this->mensaje['texto'].="Contraseña mínimo de: $min caracteres y máximo de: $max caracteres<br>";
                $this->mensaje['tipo']='warning';
             }
              return;
          }
        //metodo para  campos vacios
        function isEmpty($key){
            //     if($key==""){
            //         return true;
            //     }else {
            //         return false; //0 no se muestra en los echos
            //     }
            //mejor el if abreviado:
            //return $key=="" ? 'si':'no';    
           if ($key=="") {
               $this->mensaje['texto'].='Campo/s vacío/s <br>';
               $this->mensaje['tipo']='warning';
           }
            return;

        }

        //metodo para comprobar si el dato introducido es un email
        function isEmail($key){
            //    if (filter_var($field,FILTER_VALIDATE_EMAIL)) {
            //        return $field='si';
            //    }else {
            //        return $field='no';
            //    }
            //mucho mejor el if en abreviado:
            //return filter_var($key,FILTER_VALIDATE_EMAIL)?'si' :'no';
        
            if (!filter_var($key,FILTER_VALIDATE_EMAIL)) {
                $this->mensaje['texto'].='Email no valido <br>';
                $this->mensaje['tipo']='warning';
            }
            return;
        }

        


    }


?>
