<?php
session_start();
if(!$_SESSION['mdp']){
    header('location: conn.php');
}
include_once('config.php');
if(!isset($_GET['id']) AND empty($_GET['id'])){
    echo 'Erreur: identifiant inexistant';
    header('location: article.php');
}
$getid=strip_tags($_GET['id']);

// Recuperer l'identifiant.
$sql='SELECT * FROM article WHERE id=?';
$recupArticle=$dbb->prepare($sql);
$recupArticle->execute(array($getid));

if($recupArticle->rowCount()>0){
    foreach ($recupArticle as $article) {
        $titre= $article['titre'];
        $contenu=str_replace('<br />','',$article['contenu']);

    }

    if(isset($_POST['valider'])){
        $titre_saisi=strip_tags($_POST['titre']);
        $contenu_saisi=strip_tags($_POST['contenu']);
        $contenu_saisi=nl2br($contenu_saisi);

        $sql='UPDATE article SET titre=?, contenu=? WHERE id=?';
        $updateArticle=$dbb->prepare($sql);
        $updateArticle->execute(array($titre_saisi,$contenu_saisi,$getid));
        header('location: article.php');
    }
    
}else{
    echo 'Aucun article trouvé';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier/article</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="titre" value="<?= $titre?>"><br>
        <textarea name="contenu">
        <?= $contenu?>
        </textarea><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>