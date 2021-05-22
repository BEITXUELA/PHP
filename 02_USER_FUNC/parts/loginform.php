<!-- login form incorpora un boton para abrir el formulario incluye el html y el javaScript en jQuery -->
<div class="loginMenu">
            <?php 
        if ($_SESSION['identificado']==true) {
            //una vez identificado y logado le enseñamos su perfil
            //tiene q aparecer el logout
            require_once('perfilMenu.php');
        }else {
            //tiene q aparecer el login
            echo "<ul><li><a href='' id='login' class='login'>Login</a></li></ul>";
        }
    ?>
</div>
<div class="formlogin_container">
    <form id="formlogin" action="actions/loginaction.php" method="POST">
        <h6>x</h6>
        <table>
            <tr>
                <td colspan="2">
                    <h5>Log in</h5>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="">Nombre Usuario</label>
                </th>
                <td>
                    <input required type="mail" name="usuario" id="">
                </td>
            </tr>
            <tr class="aviso">
                <td></td>
                <td class="aviso_usuario"></td>
            </tr>
            <tr>
                <th>
                    <label for="">Clave</label>
                </th>
                <td>
                    <input required type="password" name="clave" id="">
                </td>
            </tr>
            <tr class="aviso">
                <td></td>
                <td class="aviso_clave"></td>
            </tr>
            <tr class="centrado">
                <td colspan="2">
                    <a href="" class="btn btn-info Login">Enviar</a>
                </td>
            </tr>
            <tr class="empty"><th colspan="2"></th></tr>
            <tr><th colspan="2"></th></tr>

            <tr class="spacer">
                <td colspan="2">
                    <a href="actions/open_signup.php" class="btn btn-sm btn-outline-success" title="Date de Alta">Registrarse</a>
                    <a href="actions/open_reset.php" class="btn btn-sm btn-outline-info" title="Olvidaste la clave?">Resetear clave</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<script>
    $("input[name=usuario]").blur(function (e) {
        e.preventDefault();
        //alert('jelous');
        contenido = $(this).val();
        console.log(contenido);
        objetivo = $(".aviso_usuario");
        console.log();
        if (contenido == "") {
            mensaje = "Campo Vacío";
            objetivo.text(mensaje);
            $(this).css({
                "background": "red"
            });
        } else {
            mensaje = "";
            objetivo.text(mensaje);
            $(this).css({
                "background": "inherit"
            });
        }
    });
    if ($('input[name=clave]').val().length > 7) {
        $('tr.centrado').show();        
    }
   // $("input[name=clave]").change(function (e) { 
     //   e.preventDefault();
       // $('tr.centrado').show();        
    //});

    $('input[name=clave]').on('input', function() { //alert('hola');
            valor_largo = $(this).val().length;
                if (valor_largo > 7) {
                    $('tr.centrado').slideDown(800);
                    $('.aviso_clave').text('');
                }
    });

    //$('input[name=clave]').on('input',function(){
    //$('tr.centrado').show();
        //$('aviso_clave').text('');
    //});
    // $("input[name=usuario]").keydown(function (e) {
    //     mensaje = "";
    //     objetivo.text(mensaje); //esta definido en la fila 50
    //     valor = $(this).val(); //

    //     valor_nuevo= valor.replace(' ','');
    //     $(this).val(valor_nuevo);


    // valor_largo = valor.length;
    // valor = valor.substring(valor_largo - 1, valor_largo);
    // if (valor != " ") {
    //     objetivo.text(mensaje);
    //     $(this).css({
    //         "background": "inherit"
    //     });
    // } else {
    //     texto_entrada = $(this).val();
    //     texto_largo = texto_entrada.length;
    //     texto_nuevo = texto_entrada.substring(0, texto_largo - 1);
    //     $(this).val(texto_nuevo);
    // }
    //});
    $("input[name=clave]").keyup(function (e) {
        valor_largo = $(this).val().length;
        if (valor_largo > 7) {
            $("tr.centrado").slideDown(800); //muestra el boton de enviar
            $(".aviso_clave").text('');
        } else {
            $("tr.centrado").slideUp(300); //muestra el boton de enviar
            $(".aviso_clave").text('clave demasiado corta');
        }
    });
    $(".Login").click(function (e) {
        //alert('hello');
        e.preventDefault();
        // clave_car = $('input[name=clave]').val().length;
        // //alert(clave_car);
        // if (clave_car < 8) {
        //     alert('clave corta');
        // } else {
        //     $("#formlogin").submit();
        // }
        $("#formlogin").submit();
    });
    $("#login").mouseenter(function () {
        $(".formlogin_container").fadeIn(600);
    });
    // $(".formlogin_container").mouseleave(function () { 

    //     $(this).fadeOut(400);
    // });
    $(".formlogin_container h6").click(function (e) {
        e.preventDefault();
        $(".formlogin_container").fadeOut(400);
    });
</script>