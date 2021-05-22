<!-- login form incorpora un boton para abrir el formulario -->
<!-- inlcuye el html y el javascript en jquery -->
<div class="loginMenu">
    <?php 
        if($_SESSION['user']['identificado']){
            require_once('perfilMenu.php');
        }
        else{echo '<ul><li><a href="" class="login" id="login">login</a></li></ul>';}
    ?>
</div>

<div class="formlogin_container">

    <form id="formlogin" action="routes/router.php?action=loginaction" method="POST">
        <h5 class="cerrar"><a>X</a></h5>
        <table>
            <tr>
                <td colspan=2>
                    <h5>Login</h5>
                </td>
            </tr>
            <tr>
                <th>nombre usuario</th>
                <td>
                    <input required type="mail" name="usuario" id="">
                </td>
            </tr>
            <tr class="aviso">
                <td></td>
                <td class="aviso_usuario"></td>
            </tr>

            <tr>
                <th>clave</th>
                <td>
                    <input required type="password" name="clave" id="">
                </td>
            </tr>
            <tr class="aviso">
                <td></td>
                <td class="aviso_clave"></td>
            </tr>

            <tr class="centered">
                <td colspan=2>
                    <a href="" class="btn btn-info Login">ingreso</a>
                </td>
            </tr>

            <tr class="empty"><th colspan=2></th></tr>
            <tr><th colspan=2></th></tr>

            <tr class="spacer">
                <td colspan=2>
                    <a href="open_signup" class="Submitter btn btn-sm btn-outline-success" title="Si no estas registrado registrate aquí">registrarse</a>
                    <a href="actions/open_reset.php" class="btn btn-sm btn-outline-info" title="¿Olvidaste la clave?">resetear clave</a>
                </td>
            </tr>

        </table>
    </form>
</div>

<script>

    $('input[name=usuario]').blur(function (e) { e.preventDefault();
        contenido = $(this).val(); console.log(contenido);
        objetivo = $('.aviso_usuario');
        if (contenido == '') {
            mensaje = "Campo vacío";
            objetivo.text(mensaje);
            $(this).css({'background':'red'});
        }
        else{
            mensaje = "";
            objetivo.text(mensaje);
            $(this).css({'background':'inherit'});
        }
    });


    $('input[name=clave]').keyup(function(){
        valor_largo = $(this).val().length; //alert(valor_largo);
        if(valor_largo > 7){
            $('tr.centered').slideDown(800); //muestra login btn
            $('.aviso_clave').text('');
        }
        else{
            $('tr.centered').slideUp(300); //muestra login btn
            $('.aviso_clave').text('clave demasiado corta');
        }
    });

    if ($('input[name=clave]').val().length > 7) {
        $('tr.centered').show();
    }

    $('input[name=clave]').on('input', function() {
        valor_largo = $(this).val().length; //alert(valor_largo);
        if(valor_largo > 7){
            $('tr.centered').slideDown(800); //muestra login btn
            $('.aviso_clave').text('');
        }
    });

    



    // $('input[name=usuario]').keydown(function (e) {
    //     mensaje = "";
    //     objetivo = $('.aviso_usuario');
    //     valor = $(this).val(); //alert(valor.length); alert('a'+valor+'a');

    //     valor_nuevo = valor.replace(' ','');
    //     $(this).val(valor_nuevo);


    //     valor_largo = valor.length;
    //     valor= valor.substring(valor_largo-1, valor_largo);

    //     if( valor != ' '){
    //         objetivo.text(mensaje);
    //         $(this).css({'background':'inherit'});
    //     }
    //     else{
    //         texto_entrada = $(this).val();
    //         texto_largo = texto_entrada.length;
    //         texto_nuevo = texto_entrada.substring(0, texto_largo-1);
    //         $(this).val(texto_nuevo);
    //     }

    // });


    $('.Login').click(function (e) { e.preventDefault();
        $('#formlogin').submit();
    });

    $("#login").mouseenter(function () { 
        $('.formlogin_container').fadeIn(800);
    });
    // $('.formlogin_container').mouseleave(function () { 
    //     $(this).fadeOut(400);
    // });
    $('#formlogin h5.cerrar a').click(function (e) { e.preventDefault();
        $('.formlogin_container').fadeOut(400);
    });



</script>