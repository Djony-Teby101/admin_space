<?php
session_start();
if(!$_SESSION['mdp']){
    header('location: conn.php');
}
// connexion à la db.
include_once('config.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher/tous les Membres</title>
</head>
<body>
    <!-- afficher les membres -->
    <?php
        $recupUser=$dbb->query('SELECT* FROM membres');
        while($user= $recupUser->fetch()){
            ?>
                <p><?= $user['pseudo']?>
                <a href="bannir.php?id=<?=$user['id']?>"
                style="color:red;text-decoration:none">bannir membre</a></p>
            <?php
    }
    ?>
    <!-- affciher les membres fin -->
</body>
</html>