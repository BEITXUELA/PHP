<?php
    ($mensaje['tipo'] != '')?$class = 'alert alert-'.$mensaje['tipo']:$class = '';
?>

<div class="mensaje_out">
    <div class="mensaje">
        <div class="<?php echo $class; ?>">
            <p><a>X</a></p> 
            <span class="mensaje_texto"><?php echo $mensaje['texto'];?></span>
        </div>
    </div>
</div>

<script>
    if($('.mensaje_texto').text() != '') {$('.mensaje_out').show();}
    $('.mensaje p a').click(function (e) { e.preventDefault();
        $('.mensaje_out').fadeOut(800);
    });
    setTimeout(function(){ $('.mensaje_out').fadeOut(800); }, 3900);
</script>