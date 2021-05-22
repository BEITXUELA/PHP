<?php 
?>
<?php echo 'HOLA '.' Registrate aquí <br>'; ?>
<form action="actions/signupaction.php" method="POST">
    <table>
        <tr>
            <th>
                Nombre:
            </th>
            <td>
                <input type="text" name="nombre">
            </td>
        <tr>
            <th>
                Mail:
            </th>
            <td>
                <input type="email" name="mail">
            </td>
        </tr>
        </td>
        <tr>
            <th>
                Confirma tu Mail:
            </th>
            <td>
                <input type="email" name="confirmar_mail">
            </td>
        </tr>
        </td>
        <tr>
            <th>
                Contraseña:
            </th>
            <td>
                <input type="password" name="clave">
            </td>
        </tr>
        </td>
        <tr>
            <th>
                Confirma tu contraseña:
            </th>
            <td>
                <input type="password" name="confirmar_clave">
            </td>
        </tr>
        <tr>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td>
                <a href="index.php" class="btn btn-sm btn-outline-info">Volver</a>
            </td>
            <td>
                <input class="btn btn-sm btn-outline-warning" type="submit" value="Enviar Alta">
            </td>
        </tr>
        </tr>
    </table>
</form>
<!-- ayudante para rellenar datos
<script> -->
    <!-- //ayudante para no escribir en las pruebas:
    // $('input[name=nombre]').val('Gregor');
    // $('input[name=mail]').val('gregor_gh@yahoo.es');
    // $('input[name=confirmar_mail]').val('gregor_gh@yahoo.es');
    // $('input[name=clave]').val('12345678');
    // $('input[name=confirmar_clave]').val('12345678');
 </script> -->