<?php 
include("connect.php");

$message = "";

        if (isset($_POST["submit"])) { // si j'appuie sur le boutton submit su formulaire de connexion

            if ($_POST['login'] && $_POST['password']) { // si les champ login et password sont remplis

                $login = $_POST['login'];
                $password = $_POST['password'];
                $login = false;
                
                foreach ($data as $user) { //je lis le contenu de la table $con de la BDD
                    
                    if ($_POST["login"] === $user['login'] &&
                    $_POST['password'] === $user['password']) {
                        echo "vous etes connecter";
                    } else {
                        $message="erreur dans le mdp ou login";
                    }
                }

            } else {
                $message = "veuillez remplir les champs login et mot de passe";
            }
        }

    var_dump($_POST);
    var_dump($_SESSION);

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
            <input type="text" name="password" placeholder="Mot de Passe">
            <input type="submit" name="submit" value="Se Connecter">
        </form>
    </div>
    <?php  include("footer.php"); ?>
    
</body>
</html>