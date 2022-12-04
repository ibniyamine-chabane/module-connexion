<?php

        session_start();
        if (empty($_SESSION['login'])){ // si l'utilisateur n'est pas connecté, il est rediriger vers la page d'accueil.php
            header("Location:accueil.php");
            exit;
        }

        

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widthfr, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inscription</title>
</head>
<body>
    <?php include("header.php"); ?>
    <section>
        <div class="container-form">
            <h1>Profil</h1>
            <p class="msg-error"><!--<?= $message ?>--></p>
            <form method="post">
                <label for="flogin">Login</label>
                <input type="text" name="login" placeholder="Choisissez votre login">
                <label for="fprenom">Prénom</label>
                <input type="text" name="prenom" placeholder="Votre prénom">
                <label for="fnom">Nom</label>
                <input type="text" name="nom" placeholder="Votre nom">
                <label for="fpassword">Mot de Passe</label>
                <input type="password" name="password" placeholder="Mot de Passe">
                <input type="password" name="password_confirm" placeholder="Confirmer le mot de Passe">
                <input type="submit" name="submit" value="valider">
            </form>
        </div>
        <?php include("footer.php"); ?>    
    </section>
</body>
</html>