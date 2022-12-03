<?php 
include("connect.php");
session_start();

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
                    header("Location:acceuil.php");
                }

            } else {
                $message = "veuillez remplir les champs login et mot de passe";
            }
        }

    //var_dump($_POST);
    //var_dump($data);
    //echo $user[1];

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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