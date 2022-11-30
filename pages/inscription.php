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
    <section>
        <div class="container-form">
            <h1>Inscription</h1>
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
                <input type="submit" value="valider">
                <?php 
                    
                   /* $login      = $_POST['login'];
                    $prenom     = $_POST['prenom'];
                    $nom        = $_POST['nom'];
                    $password   = $_POST['password'];
                    $password_confirm = $_POST['password_confirm']; */
                
                    
                    
                    /*elseif (empty($_POST['login']) && empty($_POST['prenom']) && empty($_POST['nom']) 
                                     && empty($_POST['password']) && empty($_POST['password_confirm'])) {
                        echo 'veuillez remplir les champs login, nom, prenom et mot de passe';
                    }*/
                    
                    
                    
                    
                    
                    /*if ($_POST['password_confirm'] === $_POST['password']) {
                        echo '<p>Succes</p>';            
                    } else {
                        echo 'failed';
                    }*/

                    //On se connecte à la base de donnée moduleconnexion
                $myDb = mysqli_connect("localhost", "root", "", "moduleconnexion",3307);
                $request = $myDb->query('SELECT `login`, `prenom`, `nom`, `password` FROM utilisateurs');
                $data = $request->fetch_assoc();  //je veut qui devienne un tableau associatif


                //message d'erreur dans le cas d'un echec de la connexion     

                if ($myDb->connect_error) {
                    die("Connection failed: " . $myDB->connect_error);
                  }

                //Je recupere les entrées de l'utilisateur pour l'inscription
                if (empty($_POST['login'])) {
                    echo "veuillez entrer un login</br>";
                } 
                
                if (empty($_POST['prenom'])) {
                    echo "veuillez entrer un prenom</br>";
                } 
                
                if (empty($_POST['nom'])) {
                    echo "veuillez entrer un nom</br>";
                } 
                
                if (empty($_POST['password'])) {
                    echo "veuillez entrer un mot de passe</br>";
                } 
                
                if (empty($_POST['password_confirm'])) {
                    echo "veuillez confirmer votre mot de passe</br>";
                } 
                
                elseif ( isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password']) && $_POST['password_confirm'] === $_POST['password'] && $_POST != empty($_POST)) {
                    $login      = $_POST['login'];
                    $prenom     = $_POST['prenom'];
                    $nom        = $_POST['nom'];
                    $password   = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    echo 'votre compte a été créer';
                    $request = $myDb->query("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password')");
                    //$request-> execute(array($login, $nom, $prenom, $password));
                } else {
                    echo 'les mdp ne correspond pas';
                }

                /*if ($_POST['password_confirm'] != $_POST['password']) {
                    echo 'le mot de passe de correspond pas !';
                }*/

                $myDb->close();
                

                var_dump($data);
                var_dump($_POST);

                
                    ?>
            </form>

            <?php 
            
            ?>

        </div>
    </section>
</body>
</html>