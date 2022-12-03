<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <?php  include("header.php"); session_start(); ?>

        <div class="container-form">
        <?php if (!empty($_SESSION['login'])): ?>
            <h1>Bienvenu <?= $_SESSION['login'] ?></h1>
        <?php else: ?>
            <h1>Bienvenue Invité</h1>
        <?php endif; ?>     
        </div>
    
    <?php  include("footer.php");   ?>
    
</body>
</html>