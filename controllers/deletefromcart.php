<?php
if(isset($_GET['del1']))
{    
    $idu = $_GET['del1'];
    $ida = $_GET['del2'];
    $del=$bdd->prepare('DELETE FROM panier WHERE id_art = ? AND id_user = ?');
    $del->execute(array($ida,$idu));
}
?>