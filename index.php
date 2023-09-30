<?php
session_start();
// verification du mdpasse.
if(!$_SESSION['mdp']){
    header('location: conn.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-page</title>
</head>
<body>
    <a style="text-decoration: none;color:green" href="membres.php">Afficher tous les membres</a><br>
    <a style="text-decoration: none;color:green" href="logout.php">deconnecter</a><br>
    <a style="text-decoration: none;color:green"  href="publier-article.php">Publier un nouvelle article</a><br>
    <a style="text-decoration: none;color:green"  href="article.php">Afficher tous les articles</a>
</body>
</html>