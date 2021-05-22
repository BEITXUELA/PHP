<!-- Ventana de mensaje para el usuariol mensaje sólo aparece si lleva contenido (!="") -->
<?php 
    if ($mensaje['tipo']!='') {
        $class='alert alert-'.$mensaje['tipo'];
    }else{
        $class='';
    }
    //lo mismo abreviado:
    //($mensaje['tipo']!='')?$class='alert alert-'.$mensaje['tipo']:$class='';
 ?>

<div class="mensaje_out">
    <div class="mensaje">
        <div class="<?php echo $class;?>">
            <p><a class="close">X</a></p>
            <span class="mensaje_texto"><?php echo $mensaje['texto'];?></span>
        </div>
    </div>
</div> 
<!-- En php seria::: (es más complicado )
habría que eliminar el código html anterior xke lo metemos en el php
y en el css quitar el display:none; 
 if ($mensaje!="") {
    echo '<div class="mensaje_out">';
    echo '<div class="mensaje">';
    echo '<div class="alert alert-danger">';
    echo '<p><a>X</a></p>';
    echo '<span class="mensaje_texto">'.$mensaje.'</span>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
 } -->
<script>
    //para poder usar echo $mensaje:
    texto_activo = $('.mensaje_texto').text();
    //console.log(texto_activo);
    if (texto_activo != "") {
        $('.mensaje_out').show();
    }

    $(".mensaje p a").click(function (e) {
        e.preventDefault();
        $('.mensaje_out').hide();

    });

    setTimeout(function () {
        $(".mensaje_out").fadeOut(800)
    }, 4000);
</script>