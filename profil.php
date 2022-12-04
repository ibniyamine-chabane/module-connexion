<?php

        session_start();
        if (empty($_SESSION['login'])){ // si l'utilisateur n'est pas connecté, il est rediriger vers la page d'accueil.php
            header("Location:index.php");
            exit;
        }

        //je me connecte à la base de donnée moduleconnexion et je récupère les donnée de la table avec $data.
        $connectDatabase = mysqli_connect("localhost", "root", "", "moduleconnexion",3307);
        //$connectDatabase = mysqli_connect("localhost", "root", "", "moduleconnexion",3307);
        $request = $connectDatabase->query('SELECT `login`, `prenom`, `nom`, `password` FROM utilisateurs');
        $data = $request->fetch_all();  //je recupere tous les donné en une fois avec fetch_all
        
        if (isset($_POST["submit"])) { // si j'appuie sur le boutton submit
                
                    
            if ($_POST['login'] && $_POST['prenom'] && $_POST['nom'] && $_POST['password'] && $_POST['password_confirm']) { // si tous les champs sont remplis

                $login      = $_POST['login'];
                $prenom     = $_POST['prenom'];
                $nom        = $_POST['nom'];
                $password   = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];

                if ($password == $password_confirm) {// si password et password_confirm sont identique

                        $loginOk = false;

                        foreach ($data as $user) { // Je lis dans le tableau de la base de donées avec une boucle

                            //echo $user[0].'</br>'; //test sur l'index $user
                                   
                            if ( $login == $user[0] ) { //une condition dans le cas ou le login existe déja 

                                $message = "le login est déja pris";
                                $loginOk = false;
                                break;
                            } else {
                                $loginOk = true;
                            }
                            //echo 'post : '. $_POST['login']; // echo utiliser pour afficher les tests
                            //var_dump($loginOk); // 
                        }
                        
                        if ( $loginOk ) { // on insert l'user dans la bdd et on fait une redirection vers la page connexion
                            $request = $connectDatabase->query("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password')");
                            header("Location:connexion.php");    
                        }

                } else {
                    $message = "le mot de passe de confirmation n'est pas identique!";
                }

            } else {
                $message= "vous devez remplir tous les champs !";
            }

        }    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widthfr, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>
<body>
    <?php include("header.php"); ?>
    <section>
        <div class="container-form">
            <h1>Votre profil</h1>
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