<ul>
    <?php 
        if ($_SESSION['user']['role']=='admin') {
            echo "<li><a href='actions/open_admin.php'>admin</a></li>";
        }
    ?>
    
    <li><a href="actions/open_perfil.php">perfil</a></li>
    <li><a href="actions/logoutaction.php" class="logout" id="logout">logout</a></li>
</ul>