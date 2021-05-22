<?php  ?>

<h5> Hola registrate aqui</h5>
<form action="actions/signupaction.php" method="post">
    <table>
        <tr>
            <th>Nombre</th>
            <td><input required type="text" name="nombre"></td>
        </tr>
        <tr>
            <th>Mail</th>
            <td><input required type="email" name="mail"></td>
        </tr>
        <tr>
            <th>confirmar Mail</th>
            <td><input required type="email" name="confirmar_mail"></td>
        </tr>
        <tr>
            <th>Clave</th>
            <td><input required type="password" name="clave"></td>
        </tr>
        <tr>
            <th>Confirmar clave</th>
            <td><input required type="password" name="confirmar_clave"></td>
        </tr>
        <tr>
            <td>
                <a href="index.php" class="btn btn-sm btn-outline-info">volver</a>
            </td>
            <td>
                <input class="btn btn-sm btn-outline-success" type="submit" value="alta">
            </td>
        </tr>
    </table>
</form>

<script>
    // $('input[name=nombre]').val('Gregorio');
    // $('input[name=mail]').val('gregor_gh@yahoo.es');
    // $('input[name=confirmar_mail]').val('gregor_gh@yahoo.es');
    // $('input[name=clave]').val('12345678');
    // $('input[name=confirmar_clave]').val('12345678');
</script>