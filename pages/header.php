    <header>
        <img src="" alt="">
        <nav>
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="">Connexion</a></li>
                <li><a href="">Inscription</a></li>
                <?php  
                if (isset($_SESSION['login'])  && $_SESSION['login'] === 'admin')  {
                    echo '<li><a href="admin.php">admin</a></li>';
                } ?>
            </ul>
        </nav>
    </header>
