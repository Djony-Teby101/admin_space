<?php
session_start();
if(!$_SESSION['mdp']){
    header('location: conn.php');
}
include_once('config.php');



if(isset($_POST['envoi']) AND !empty($_POST['envoi'])){
    if(!empty($_POST['titre']) AND !empty($_POST['contenu'])){
            $titre=strip_tags($_POST['titre']);
            $contenu=strip_tags($_POST['contenu']);
            $contenu=nl2br($contenu);

            $sql='INSERT INTO article(titre, contenu)
            VALUES(?,?)';
            $insertArticle=$dbb->prepare($sql);
            $insertArticle->execute(array($titre, $contenu));
            
            echo "Post publié avec success";
            header('location:article.php');
    }else{
        echo "Veuilez completer tous les champs...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier-article</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="titre">
        <textarea name="contenu" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>