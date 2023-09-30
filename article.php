<?php
session_start();
if(!$_SESSION['mdp']){
    header('location: conn.php');
}
include_once('config.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage/articles</title>
    <style>
        .article{
            border: 1px solid #d1d1d1;
            
        }
        h1{
            text-align: center;
            color: grey;
            text-transform: uppercase;
        }
        p{
            text-align: center;
            color: #ef1;

        }
        button{
            color: white;
            background-color: red;
            margin-bottom:10px;
        }
        .btn{
            color: white;
            background-color: darkcyan;
            margin-bottom:10px; 
        }
    </style>
</head>
<body>
    <?php
    // Recuperer tous les postes.
    $sql='SELECT * FROM article';
    $recupPost=$dbb->query($sql);

   foreach($recupPost as $post){
    $id=$post['id'];
    ?>
        <div class="article">
            <h1><?=$post['titre']?></h1>
            <p><?=$post['contenu']?></p>
            <a href="supprimer.php?id=<?=$id?>">
                <button >Supprimer</button>
            </a>

            <a  href="modifier-article.php?id=<?=$id?>">
                <button class="btn" >Modifier</button>
            </a>
        </div>
        <br>
    <?php
    }
    ?>
</body>
</html>