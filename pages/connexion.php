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
    <?php  include("header.php");     ?>
    <div class="container-form space-bottom-connect">
        <h1>Connexion</h1>
        <form method="post">
            <label for="flogin">Login</label>
            <input type="text" name="login" placeholder="login">
            <label for="fpassword">Mot de Passe</label>
            <input type="text" name="password" placeholder="Mot de Passe">
            <input type="submit" value="Se Connecter">
        </form>
    </div>
    <?php  include("footer.php");     ?>
    
</body>
</html>