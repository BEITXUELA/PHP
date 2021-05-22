<?php 

    class Formcontrol{

        //vacio - hecho
        //email - hecho
        //string
        //length max
        //length min
        //match - coincide

        public $mensaje = ['texto'=>'', 'tipo'=>''];

        // function FieldControl($fields){ //var_dump($fields); 
        //     foreach ($fields as $key => $field) { //echo $key."<br>";
        //         foreach ($field as $check) { //echo $check.'<br>';
        //             //realizar el control
        //             //if($check == 'empty'){$this->is_empty($key);}
        //             //if($check == 'email'){$this->is_email($key);} 
        //             $my_method = 'is_'.$check;  //echo $my_method; die; 
        //             $this->$my_method($key);
        //         }
        //     }

        //     $_SESSION['mensaje'] = $this->mensaje;
        //     if($this->mensaje['texto'] != ''){header('Location: ../index.php'); die;}
        //     return;
        // }

        function FieldControl($formfields, $params){ //var_dump($fields);  echo $formfields; //en caso de login -> getLoginFields
            $fields = $this->{$formfields}($params); //echo '<pre>'; var_dump($fields); echo '</pre>'; die;

            foreach ($fields as $key => $field) { //echo $key.' '.$field."<br>";
                $key = substr($key, strpos($key, '/')+1); //echo $key; die;
                foreach ($field as $check) { //echo $check.'<br>';
                    $my_method = 'is_'.$check;  //echo $my_method; die; 
                    $this->$my_method($key);
                }
            }

            $_SESSION['mensaje'] = $this->mensaje;
            //echo '<pre>'; var_dump($_SERVER); echo '</pre>'; echo "<br>";

            if($this->mensaje['texto'] != ''){header("Location: $_SERVER[HTTP_REFERER]"); die;}

            return;
        }

        private function getResetPasswordFields($params){
            $fields = array(
                '0/'.$params['clave'] => ['empty', 'minmax'],
                '1/'.$params['confirmar_clave'].'?'.$params['clave'] => ['match']
            );
            return $fields;
        }

        private function getLoginFields($params){
            $fields = array(
                     '0/'.$params['usuario'] => ['empty', 'email'],
                     '1/'.$params['clave'] => ['empty']
                 );
            return $fields;
        }

        private function getSignUpFields($params){
            $fields = array(
                     '0/'.$params['nombre'] => ['empty'],
                     '1/'.$params['mail'] => ['empty', 'email'],
                     '2/'.$params['confirmar_mail'].'?'.$params['mail'] => ['match'],
                     '3/'.$params['clave'] => ['empty', 'minmax'],
                     '4/'.$params['confirmar_clave'].'?'.$params['clave'] => ['match'],
                 );
            //echo '<pre>'; var_dump($fields); echo '</pre>'; die;
            return $fields;
        }

        private function getResetFields($params){
            $fields = array(
                '0/'.$params['mail'] => ['empty', 'email']
            );
            return $fields;
        }

        function is_match($key){
            $pos = strpos($key, '?');
            $param1 = substr($key, 0, $pos);
            $param2 = substr($key, $pos+1); //echo $param1.' '.$param2;

            if ($param1 != $param2) {
                $this->mensaje['texto'] .= 'Campos no coinciden! <br>';
                $this->mensaje['tipo'] = 'warning';
            }
            return;
        }


        function is_minmax($key){
            $min = 8; $max = 24;
            $len = strlen($key); 
            if ( $len < $min || $len > $max ) {
                $this->mensaje['texto'] .= "Contraseña min $min - max $max <br>";
                $this->mensaje['tipo'] = 'warning';
            }
            return;
        }

        function is_empty($key){
            if ($key == '') {
                $this->mensaje['texto'] .= 'Campo o campos vacios! <br>';
                $this->mensaje['tipo'] = 'warning';
            }
            return;
        }

        function is_email($key){ //var_dump($field); die;
            if (!filter_var($key, FILTER_VALIDATE_EMAIL)) {
                $this->mensaje['texto'] .= 'Email no valido! <br>';
                $this->mensaje['tipo'] = 'warning';
            }
            return;
        }

    }



?>