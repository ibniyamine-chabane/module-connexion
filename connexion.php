<?php 
include("connect.php");
session_start();
if (!empty($_SESSION['login'])){ // si l'utilisateur est déja connecté il est rediriger vers la page d'accueil.php
    header("Location:accueil.php");
    exit;
}

        


        $message = "";
        
        if (isset($_POST["submit"])) { // si j'appuie sur le boutton submit su formulaire de connexion

            if ($_POST['login'] && $_POST['password']) { // si les champ login et password sont remplis

                $login = $_POST['login'];
                $password = $_POST['password'];
                $logged = false;
                
                foreach ($data as $user) { //je lis le contenu de la table $con de la BDD
    
                    if ($login === $user[0] &&
                    $password === $user[1]) {
                        //$message = "vous etes connecter"; // test pour afficher si on est connecté 
                        
                        $_SESSION['login'] = $login;
                        $logged = true;
                        break;
                    } else {
                        $message = "erreur dans le mdp ou login";
                    }
                }
                
                if ($logged) { // si l'utilisateur est dans la BDD est bien authentifié
                    // ici je récupere les info de l'utilisateur qui viens de se connecter 
                    //avec une requete sql et j'enregistre ces infos dans des variable $_SESSION pour la page de profil.
                    $connectDatabase2 = mysqli_connect("localhost", "root", "", "moduleconnexion",3307);
                    $filled = $_SESSION['login'];
                    $sql_select = "SELECT `login`, `prenom`, `nom`, `password` FROM utilisateurs WHERE login = '$filled'";
                    $request_info = $connectDatabase2->query($sql_select);
                    $user_info = $request_info->fetch_all();
                    $login_prefilled = $user_info[0][0];
                    $firstname_prefilled = $user_info[0][1];
                    $name_prefilled = $user_info[0][2];
                    $password_prefilled = $user_info[0][3];
                    $_SESSION['login'] = $login_prefilled;
                    $_SESSION['prenom'] = $firstname_prefilled;
                    $_SESSION['nom'] = $name_prefilled;
                    $_SESSION['password'] = $password_prefilled;


                    header("Location:index.php");
                }

            } else {
                $message = "veuillez remplir les champs login et mot de passe";
            }
        }

        

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
    <?php  include("header.php");  ?>
    <div class="container-form space-bottom-connect">
        <h1>Connexion</h1>
        <p class="msg-error"><?= $message ?></p>
        <form method="post">
            <label for="flogin">Login</label>
            <input type="text" name="login" placeholder="login">
            <label for="fpassword">Mot de Passe</label>
            <input type="password" name="password" placeholder="Mot de Passe">
            <input type="submit" name="submit" value="Se Connecter">
        </form>
    </div>
    <?php  include("footer.php"); ?>
    
</body>
</html>