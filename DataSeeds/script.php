<?php 
include_once '../cnx.php';
ini_set('memory_limit', '1024M');
$json = file_get_contents('./products.json');
$ini = json_decode($json,true);
foreach($ini as $row){
    $array=$row['category'];
        $rows.= $row['sku'].' => '.$row['name'].' => '.$row['description'].' => '.$row['price'].' => '.$array[0]['id'].' => '.$array[0]['name'].'<br>';
        $insert = $bdd->prepare('INSERT INTO products(sku,name,description,price,image,catID)VALUES(?,?,?,?,?,?)');
        $insert->execute(array($row['sku'],$row['name'],$row['description'],$row['price'],$row['image'],$array[0]['id']));
        $insertCat = $bdd->prepare('INSERT INTO categorie (id, name)VALUES (?,?)');
        $insertCat->execute(array($array[0]['id'],$array[0]['name']));
}
?>