<ul>
<?php 
    if ($_SESSION['user']['role']=='admin') {
        echo '<li><a href="actions/open_admin.php">Admin</a></li>';
    }
 ?>
    <li><a href="actions/open_perfil.php">Perfil</a></li>
    <li><a href='actions/logoutaction.php' id='logout' class='logout'>Logout</a></li>
</ul>