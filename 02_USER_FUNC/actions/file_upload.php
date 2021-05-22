<?php 
    //usar bbdd para guardar ruta de la imagen
    //guardar la imagen/file en el servidor
    require_once('../functions/conexion.php'); //se necesita xk se usa en functiones usuario
    require_once('../functions/usuario.php');
    require_once('../functions/helper.php');
    session_start();
    if ($_SESSION['identificado'] ==false) {
        header('Location:../index.php');die;
    }
    $foto=$_FILES['foto']; //var_dump($foto); echo "<br>"; //die;
    $formato=$_FILES['foto']['name']; 
    //echo $formato.'<br>';
    //$formato=strrev($formato);
    //echo $formato.'<br>';
    //echo $formato.'<br>';
    $formato=substr($formato,strrpos($formato,'.')); //echo $formato.'<br>';

    //die;
    $image_type=$_FILES['foto']['type']; echo  $image_type;
    //comprobar tipo del fichero:
    $tipos_permitidos=array('image/jpeg','image/jpg','image/png');
    $control=in_array($image_type,$tipos_permitidos);


    //alternativa de in_array():
    // $control=false;
    // foreach ($tipos_permitidos as $key => $tipo_permitido) {
    //     if ($t==$image_type) {
    //         $control= true; break;
    //     }
    // }
    if ($control!=1) {
        $_SESSION['mensaje']['texto']= "Formato de imágen no permitido";
        $_SESSION['mensaje']['tipo']= "warning";
        header('Location: open_perfil.php'); die;
    }
    $image_size=$_FILES['foto']['size'];  echo $image_size;
    if ($image_size>1000000) {
        $_SESSION['mensaje']['texto']= "Imágen muy grande, máximo de 1MB";
        $_SESSION['mensaje']['tipo']= "warning";
        header('Location: open_perfil.php'); die;
    }
    //die;
    //$ruta_real= $_SERVER['DOCUMENT_ROOT']; var_dump($ruta_real); //die;
    $user_id=getUserId($_SESSION['usuario']); //echo $user_id; 
    $ruta= '../web/uploads/users/'.$user_id.'/';
    //echo $ruta; die;
    //crear la carpeta users dentro de uploads:
    if (!file_exists($ruta)) {
        mkdir($ruta,0757);
    }
    //echo file_exists($ruta); die;
    //mkdir('../web/uploads/users/'); die;
    $nombre_foto= $user_id.'_perfil'.$formato;
    //borrar fotos anteriores - si los hay:
    $ficheros = glob($ruta.'*'); //obtenemos todos los elementos de los archivos y carpetas
    //echo 'files : '; var_dump($fichero); die;
        foreach($ficheros as $fichero){
            if(is_file($fichero)){
                unlink($fichero); //elimino el fichero
                //var_dump($fichero); echo '<br>';
            }
        }
       

    move_uploaded_file($_FILES['foto']['tmp_name'],$ruta.$nombre_foto);
    echo '<br> getimagesize:';
    //var_dump(getimagesize($ruta.$nombre_foto)); die;
    $image_size=(getimagesize($ruta.$nombre_foto));
    $image_width= $image_size[0];
    $image_height= $image_size[1];
    echo $image_width.' '.$image_height; //die;    

    $new_width= 800;
    $relation=$image_height/$image_width;
    $new_height=round($new_width*$relation);
    echo '<br>';
    echo ($new_width.' '.$new_height); //die;
    
    $dst_image=$thumb;
    $src_image=$ruta.$nombre_foto;
    $dst_x=0;
    $dst_Y=0;
    $src_x=0;
    $src_y=0;
    $dst_w=$new_width;
    $dst_h=$new_height;
    $src_w=$image_width;
    $src_h=$image_height;


    $thumb=imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled ($dst_image , $src_image , $dst_x , $dst_y , $src_x , $src_y , $dst_w , $dst_h , $src_w , $src_h );
    //imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h );

        // // El archivo
        // $nombre_archivo = 'prueba.jpg';
        // $porcentaje = 0.5;

        // // Tipo de contenido
        // header('Content-Type: image/jpeg');

        // // Obtener nuevas dimensiones
        // list($ancho, $alto) = getimagesize($nombre_archivo);
        // $nuevo_ancho = $ancho * $porcentaje;
        // $nuevo_alto = $alto * $porcentaje;

        // // Redimensionar
        // $imagen_p = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
        // $imagen = imagecreatefromjpeg($nombre_archivo);
        // imagecopyresampled($imagen_p, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

        // // Imprimir
        // imagejpeg($imagen_p, null, 100);
            

    usuario_imagen_perfil('guardar',$_SESSION['usuario'],$ruta.$nombre_foto);

    //var_dump($foto); var_dump($_SERVER); die;
    //$_SESSION['mensaje']['texto']='Se ha cargado tu archivo';
    $_SESSION['profileroute']=$ruta.$nombre_foto;
    //$_SESSION['mensaje']['tipo']='success';

    $_SESSION['reload']='yes';
    header('Location: ../backend/perfil.php'); die;

    //uploads/users/id_user/img/


?>