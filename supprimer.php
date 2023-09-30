<?php
session_start();
if(!$_SESSION['mdp']){
    header('location: conn.php');
}
include_once('config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
   $getid=strip_tags($_GET['id']);

    // Etape 1: selectionner le produit.
   $sql='SELECT * FROM article WHERE id=?';
   $recupArticle=$dbb->prepare($sql);
   $recupArticle->execute(array($getid));

   if(!$recupArticle->rowCount()>0){
     die("Aucun article trouvé!");
   }
    // Etape 2: supprimer l'article.
    $sql='DELETE FROM article WHERE id=?';
    $deleteArticle=$dbb->prepare($sql);
    $deleteArticle->execute(array($getid));
    header('location: article.php');
}else{
    echo " Aucun identifiant trouvé";
}
?>