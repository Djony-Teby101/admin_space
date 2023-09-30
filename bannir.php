<?php
session_start();

if(isset($_GET['id']) AND !empty($_GET['id'])){
    include_once('config.php');

    $getid=strip_tags($_GET['id']);
    $sql='SELECT * FROM membres WHERE id=?';

    $recupUser=$dbb->prepare($sql);
    $recupUser->execute(array($getid));
    
    if($recupUser->rowCount()>0){
        
        $sql='DELETE FROM membres WHERE id=?';
        $bannirUser=$dbb->prepare($sql);
        $bannirUser->execute(array($getid));
        header('location: membres.php');

    }else{
       echo "utilisateur non trouvé!";
    }
}else{
    echo "l'Identifiant not found !";
}

?>