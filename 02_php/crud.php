<?php 
    session_start();
    $tabla=($_SESSION['usuario_listado']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
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
        <h2>CRUD POO)</h2>
        <p>
            Create Read Update Delete - Tabla Usuarios en DB tienda
        </p>

    </div>


    <div class="block text-center">
        <h2>Create / Crear</h2>
        <p></p>
        <form action="actions/UserCreateAction.php" method="POST">
            <table>
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="nombre" id="" required></td>
                </tr>
                <tr>
                    <th>Usuario</th>
                    <td><input type="email" name="usuario" id="" required></td>
                </tr>
                <tr>
                    <th>Clave</th>
                    <td><input type="password" name="clave" id="" required></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        <select name="role" id="" required>
                            <option value="admin">Admin</option>
                            <option selected value="usuario">Usuario</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="btn btn-sm btn-outline-success" type="submit" value="Crear"></td>
                </tr>
            </table>

        </form>
    </div>


    <div class="block text-center">
        <h2>Read / Leer</h2>
        <p>Listado Usuarios</p>
        <?php 
            echo $tabla;
        ?>

    </div>



    <footer></footer>

   
</body>

</html>