<ul class="adminMenu">
    <?php 
        $li_admin='<li><a href="../actions/open_admin.php">Admin</a></li>';
        if ($_SESSION['role']=='admin') {
            echo $li_admin;
        }
    ?>
    <li><a href="../actions/open_perfil.php">Perfil</a></li>
    <li><a href="../actions/logoutaction.php">Logout</a></li>
</ul>