<?php 
    session_start();
    $user=($_SESSION['usuario_update']);
    // echo '<pre>';
    // var_dump($usuario_update);
    // echo '</pre>';
    //unset($_SESSION['usuario_update']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD UPDATE PHP</title>
    <?php require('parts/head.html'); ?>
    <style>
        table {
            margin-right: auto;
            margin-left: auto;
        }

        table th {
            text-align: right;
            margin-right: 5px;
        }

        table td {
            text-align: left;
        }
    </style>

</head>

<body>
    <div data-site=".crud" class="site"></div>

    <?php require_once('parts/header.html'); ?>
    <?php include_once('parts/menu.html'); ?>

    <div class="block text-center">
        <h2>CRUD POO - UPDATE en web separada</h2>
        <p>
            Create Read Update Delete - Tabla Usuarios en DB tienda
        </p>

    </div>


    <div class="block text-center">
        <h2>Update</h2>
        <p></p>
        <form action="actions/user_updateAction.php" method="POST">
            <table>
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="nombre" value=<?php echo $user['nombre']; ?> id="" required></td>
                </tr>
                <tr>
                    <th>Usuario</th>
                    <td><input type="email" name="usuario" value=<?php echo $user['usuario']; ?>id="" required></td>
                </tr>
                <tr>
                    <th>Clave</th>
                    <td><input type="password" name="clave" value=<?php echo $user['clave']; ?> id="" required></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        <select name="role" id="" required>
                            <option <?php if($user['role']== 'admin'){echo "selected";}?> value="admin">Admin</option>
                            <option <?php if($user['role']== 'usuario'){echo "selected";}?> value="usuario">Usuario</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="btn btn-sm btn-outline-success" type="submit" value="Actualizar"></td>
                </tr>
            </table>

        </form>
    </div>


    <footer></footer>

   
</body>

</html>