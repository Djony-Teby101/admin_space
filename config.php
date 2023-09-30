<?php
try {
$dbb=new PDO('mysql:host=localhost;dbname=espace_admin'
                                            ,'root','');
} catch (PDOException $e) {
    die("Erreur".$e->getMessage());
}
?>