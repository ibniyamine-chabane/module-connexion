    <header>
        <img src="" alt="">
        <nav>
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <?php  
                if (isset($_SESSION['login'])  && $_SESSION['login'] === 'admin')  {
                    echo '<li><a href="admin.php">admin</a></li>';
                } ?>
                <?php if (!empty($_SESSION['login'])): ?>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
                <?php else: ?>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Se connecter</a></li>
                <?php endif; ?>  
                
            </ul>
        </nav>
    </header>
