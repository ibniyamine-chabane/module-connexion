<?php  $database_Host = 'localhost';
$database_User = 'root';
$database_Pass = '';
$database_Name = 'moduleconnexion';

$con = mysqli_connect($database_Host, $database_User, $database_Pass, $database_Name, 3307); 
$request = $con->query('SELECT `login`, `prenom`, `nom`, `password` FROM utilisateurs');
$data = $request->fetch_All();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>administrateur</title>
</head>
<body>
    <?php session_start(); include("header.php"); ?>

    <table border>
        <thead>
            <th>login</th>
            <th>prenom</th>
            <th>nom</th>
            <th>password</th>
        </thead>

    <?php

    foreach ($data as $users) {
        
        echo '<tr>
                <td>'.$users[0].'</td>
                <td>'.$users[1].'</td>
                <td>'.$users[2].'</td>
                <td>'.$users[3].'</td>
              </tr>';
    }         
    ?>
    </table>
    <?php  include("footer.php"); ?>
</body>
</html>