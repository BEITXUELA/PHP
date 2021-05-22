<?php 
    function irA($destino)
    {
      header("Location:".$destino);
      return;   
    }

    function campos_vacios($campos){ //var_dump($campos); echo "<br>";
     $vacios=false;   
    foreach ($campos as $key => $campo) { //echo $key.": ".$campo."<br>";
        if ($campo=='') {
            $vacios=true;
            break;
        }
    }    
       
        return $vacios;
    }

   
?>