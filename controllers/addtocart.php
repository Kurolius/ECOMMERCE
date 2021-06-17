<?php
if(isset($_POST['qte']))
{    
    $id = htmlspecialchars($_POST['id']);
    $user = htmlspecialchars($_SESSION['id']);
    $qte = htmlspecialchars($_POST['qte']);
    $ins=$bdd->prepare('INSERT INTO panier(id_art,id_user,qte) VALUES(?,?,?)');
    $ins->execute(array($id,$user,$qte));
}
?>