<?php
session_start();

if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_defaut= 'admin123';
        $mdp_par_defaut='admin111';

        // nettoyer les valeurs
        $pseudo_saisi=strip_tags($_POST['pseudo']);
        $mdp_saisi=strip_tags($_POST['mdp']);

        // verification
        if($pseudo_saisi== $pseudo_par_defaut AND 
            $mdp_par_defaut== $mdp_saisi){
                $_SESSION['mdp']=$mdp_saisi;
                header('location: index.php');
            }else{
                echo "Vos informations sont incorrect!";
            }
    }else{
        echo "Veuillez completer tous les champs";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_dashboard</title>
</head>
<body>
    <form method="post" style="text-align:center">

        <div>
            <label for="pseudo">pseudo</label>
            <input type="text" name="pseudo" autocomplete="off">
        </div>

        <div>
            <label for="pass">passwo</label>
            <input type="password" name="mdp" >
        </div>
        <br>
        <input type="submit" name="valider">
    </form>
    
</body>
</html>